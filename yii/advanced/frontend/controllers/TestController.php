<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;

/**
 * Site controller
 */
class TestController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout = false;
    
    // 添加
    public function actionUser_add(){
    	$arr = [
				't_id'     => '',
				't_name'     => '',
				't_type'     => '',
				't_value'    => '',
				't_show'     => '',
				't_rule'     => '',
				't_astrict1' => '',
				't_astrict2' => '',
			];
    	if ($t_id = Yii::$app->request->get('t_id')) {
    		$sql  = "SELECT * FROM test_1 WHERE t_id=".$t_id;
		   	$query = Yii::$app->db->createCommand($sql)->queryall();
		   	$arr = $query[0];
    	}
    	
        // 无论是初始化显示还是数据验证错误
        return $this->render('user_add',['list'=>$arr]);
        
    }
    // 添加 动作
    public function actionUser_add_do(){
    	$post = Yii::$app->request->post();          // 即 $_GET;

			$arr = [
				't_name'     => $post['t_name'],
				't_type'     => $post['t_type'],
				't_value'    => $post['t_value'],
				't_show'     => $post['t_show'],
				't_rule'     => $post['t_rule'],
				't_astrict1' => $post['t_astrict1'],
				't_astrict2' => $post['t_astrict2'],
			];//（建议使用字段绑定）
		if ($t_id = Yii::$app->request->post('t_id')) {
			$re = Yii::$app->db->createCommand()->update('test_1', $arr,'t_id = '.$t_id)->execute();
		}else{
			$re = Yii::$app->db->createCommand()->insert('test_1', $arr)->execute();
		}
		if ($re == 1) {
         	return  $this->redirect(['test/user_show']);
		}

    }
    // 展示
    public function actionUser_show(){
    	$sql  = "SELECT * FROM test_1";
	   	$query = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('user_show',['list'=>$query]);
    }

   	// 删除
    public function actionUser_del(){
		$list = Yii::$app->db->createCommand()->delete('test_1', 't_id = '.Yii::$app->request->get('t_id'))->execute();
    	if ($list == 1) {
			return  $this->redirect(['test/user_show']);
		}
    }



}
