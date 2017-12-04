<?php
namespace frontend\controllers;

use Yii;
// use yii\base\InvalidParamException;
// use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\db\query;
// use yii\filters\VerbFilter;
// use yii\filters\AccessControl;
// use common\models\LoginForm;
// use frontend\models\PasswordResetRequestForm;
// use frontend\models\ResetPasswordForm;
// use frontend\models\SignupForm;
// use frontend\models\ContactForm;
// use app\models\EntryForm;
// use app\models\User;

/**
 * Site controller
 */
class SignController extends Controller
{
	public $layout = false; //不使用布局
    public $enableCsrfValidation = false;


    // 实验
    public function actionIndex(){

		
    	
    	// 查询用户十天内的签到数据
    	$date =  date("Y-m-d",strtotime("-10 day"));
    	$sql="SELECT * FROM sign_record WHERE u_id= :id AND r_date >= '$date'";
    	$query = Yii::$app->db->createCommand($sql,[':id' => '001'])->queryAll();
    	
    	// 查找 最新十天 是否有需要补签的
    	$query = array_column($query,'r_date'); // 二维数组转一维数组
    	$arr = [];
    	for ($i=1; $i <= 10; $i++) { 
    		if (!in_array(date("Y-m-d",strtotime("-$i day")),$query)) {
    		 	$arr[] = date("Y-m-d",strtotime("-$i day"));
    		 } 
    	}
    	// var_dump($arr);

    	
    	// exit;
        return $this->render('index',['list' => $arr]);
    }
    // 实验
    public function actionAdd(){

    	// 最后一个问题,判断本次 与 上次 的60天特殊奖励 是否间隔60天

		$u_id = Yii::$app->request->post('id');         // 即 用户id
		$sql="SELECT * FROM sign WHERE u_id= :id"; 	// 查询 用户数据
    	$query = Yii::$app->db->createCommand($sql,[':id' => $u_id])->queryOne();

    	// 判断连续签到天数
		switch ($query['s_date']) {
			case date("Y-m-d"):
				echo "你已经签过到了";exit;
				break;
			case date("Y-m-d",strtotime("-1 day")):
				$s_continuous = $query['s_continuous']+1; // 连续签到次数
				break;
			default:
				$s_continuous = 1; // 连续签到次数
				break;
		}

		$num = $s_continuous >= 5 ? 5 : $s_continuous; // 签到奖励
		if ($s_continuous%60 ==0) { $num = 105; } // 连续签到60天,或60的倍数,特殊奖励
		
		// 修改用户 积分数量 与 签到时间
		$sql='UPDATE sign SET s_num = s_num+'.$num.' , s_continuous = '.$s_continuous.' ,s_date = "'.date("Y-m-d").'"  WHERE u_id = '.$u_id;
		// echo $sql;exit;
		$res = Yii::$app->db->createCommand($sql)->execute();
		
		// 添加 用户操作记录 到记录表
		$sql= "INSERT INTO sign_record (u_id, u_content, r_date,r_datetime) VALUES ('".$u_id."', '+$num','".date("Y-m-d")."','".date("Y-m-d H:i:s")."')";
		$res=Yii::$app->db->createCommand($sql)->execute();
    }

    // 补签
    public function actionRepair(){
		$u_id   = Yii::$app->request->get('u_id');         // 即 用户id
		$u_id   = '001';
		$repair = Yii::$app->request->get('repair');       // 补签日期

		// 查询 用户 积分是否 足够签到
		$sql="SELECT * FROM sign WHERE u_id= :id and s_num >= 100"; 	
    	$data = Yii::$app->db->createCommand($sql,[':id' => $u_id])->queryOne();
    	if (!$data) {
    		echo "抱歉你的积分不足,无法不补签";exit;
    	}

    	// 积分足够进行补签
	    	// 减去补签所需积分
		$sql='UPDATE sign SET s_num = s_num-100 , s_continuous = s_continuous+1 WHERE u_id = '.$u_id;
		$res = Yii::$app->db->createCommand($sql)->execute();

		// 添加 用户操作记录 到记录表
		$sql= "INSERT INTO sign_record (u_id, u_content, r_date,r_datetime) VALUES ('".$u_id."', '-100','".$repair."','".date("Y-m-d H:i:s")."')";
		$res=Yii::$app->db->createCommand($sql)->execute();
		echo "补签完成";

	// 查询用户上次连续签到60天特殊奖励的时间
		$date =  date("Y-m-d",strtotime("-60 day"));
    	$sql="SELECT * FROM sign_record WHERE u_id = :id AND u_content >= 100 order by r_datetime desc";
    	$query = Yii::$app->db->createCommand($sql,[':id' => '001'])->queryOne();
		if (!empty($query['r_datetime']) && $query['r_datetime'] > $date) {
    		echo "签到时间不够60天";exit;
    	}

		// 查询用户60天内的签到数据
    	$date =  date("Y-m-d",strtotime("-60 day"));
    	$sql="SELECT * FROM sign_record WHERE u_id= :id AND r_date > '$date'";
    	$query = Yii::$app->db->createCommand($sql,[':id' => '001'])->queryAll();
    	
    	// 查找 补签完成之后 是否达成连续签到60天
    	$query = array_column($query,'r_date'); // 二维数组转一维数组
    	// var_dump($query);exit;  
    	$arr = [];
    	for ($i=0; $i < 60; $i++) { 
    		if (!in_array(date("Y-m-d",strtotime("-$i day")),$query)) {
    		 	$arr[] = date("Y-m-d",strtotime("-$i day"));
    		 } 
    	}
    	if (empty($arr)) {
    		// 达成连续签到60天
    		// 修改用户 积分数量 
			$sql='UPDATE sign SET s_num = s_num+100 , s_continuous = 0 WHERE u_id = '.$u_id;
			// echo $sql;exit;
			$res = Yii::$app->db->createCommand($sql)->execute();
			
			// 添加 用户操作记录 到记录表
			$sql= "INSERT INTO sign_record (u_id, u_content,r_datetime) VALUES ('".$u_id."', '+100','".date("Y-m-d H:i:s")."')";
			$res=Yii::$app->db->createCommand($sql)->execute();
			echo "达成连续签到60天 +100";
    	}

    	
    }
}
