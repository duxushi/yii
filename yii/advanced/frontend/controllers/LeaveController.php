<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\data\Pagination;
// use app\models\EntryForm;
use app\models\Leave;


use DfaFilter\SensitiveHelper;
// require './vendor/autoload.php';
/**
 * Site controller
 */
class LeaveController extends Controller
{
    public $enableCsrfValidation = false;
    //登录
    public function actionLogin()
    {
    	if ($_POST) {
    		
    		$sql  = "SELECT * FROM user WHERE name='".$_POST['name']."' AND pas='".$_POST['pas']."'";
	   		$query = Yii::$app->db->createCommand($sql)->queryOne();
			// var_dump($query);
			// exit;
			if ($query) {
				$session = Yii::$app->session;
				$session->open();
				
				$session->set('user_id', $query['id']);
				$this->redirect(['leave/show']);
			}else{
				echo "错误";
			}
    	}else{
    		return $this->render('login');
    	}
    	
    }
    // 实验
    public function actionDemo()
    {
        // echo "321";exit;
        $content = '察象蚂98564985';
        // 获取感词库索引数组
        $wordData = array(
            '察象蚂',
            '拆迁灭',
            '车牌隐',
            '成人电',
            '成人卡通',
        );

        // $islegal = SensitiveHelper::init()->setTree($wordData)->islegal($content);
        $islegal = SensitiveHelper::init()->setTree($wordData)->replace($content, '***');
        var_dump($islegal);
    }
    // 添加
    public function actionShow()
    {
    	return $this->render('show');
    }
    // 展示
    public function actionShow_ll()
    {

    	$sql  = "SELECT * FROM `user`";
   		$users = Yii::$app->db->createCommand($sql)->queryAll();
	   $query = Leave::find();
        $countQuery = clone $query;
        $pageSize = 3;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => $pageSize]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('show_ll', [
            'models' => $models,
            'pages' => $pages,
            'users' => $users,
        ]);

	    
	
    }

    // 修改
    public function actionUpdata()
    {
    	

		$sql  = "SELECT * FROM `leave` WHERE l_id=".$_GET['id'];
   		$query = Yii::$app->db->createCommand($sql)->queryOne();
    	// var_dump($query);exit;
    	return $this->render('updata',['list'=>$query]);
    }
    // 修改动作
    public function actionUpdata_do()
    {
    	var_dump($_POST);
    	$arr=[
	   			'l_name' 	 => $_POST['name'],
	   			'l_countent' => $_POST['text'],
	   			'l_time' 	 => time(),
	   		];
    	$list = Yii::$app->db->createCommand()->update('leave', $arr, 'l_id = '.$_POST['id'])->execute();
    	if ($list == 1) {
			$this->redirect(['leave/show_ll']);
			// echo "修改成功";
		}
	   	
    }
    // 删除
    public function actionDel()
    {
    	$list = Yii::$app->db->createCommand()->delete('leave', 'l_id = '.$_GET['id'])->execute();
    	if ($list == 1) {
			$this->redirect(['leave/show_ll']);
		}
    	// return $this->render('updata');
    }
    // 添加动作
    public function actionAdd()
    {
    	$session = Yii::$app->session;
    	$session->open();
    	$user_id = $session->get('user_id');
    	// var_dump($_POST);exit;

	   	$arr=[
	   			'l_name' 	 => $_POST['name'],
	   			'l_countent' => $_POST['text'],
	   			'l_time' 	 => time(),
	   			'u_id'		 => $user_id,
	   		];
		$re = Yii::$app->db->createCommand()->insert('leave', $arr)->execute();
		if ($re) {
			$this->redirect(['leave/show_ll']);
		}else{
			echo "错误";
		}
		// var_dump($re);
    }
    function actionIndex()
	{
	    $query = Article::find()->where(['status' => 1]);
	    $countQuery = clone $query;
	    $pages = new Pagination(['totalCount' => $countQuery->count()]);
	    $models = $query->offset($pages->offset)
	        ->limit($pages->limit)
	        ->all();

	    return $this->render('show_ll', [
	         'models' => $models,
	         'pages' => $pages,
	    ]);
	}

}
