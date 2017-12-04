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
class ExamineController extends Controller
{
	public $layout = false; //不使用布局
    public $enableCsrfValidation = false;

    static $arr = [];

    // 注册
    public function actionIndex(){
    	$request = Yii::$app->request;
		$res = ['cellphone'=>'','pas'=>''];
		if ($id  = $request->get('id')) {
			$sql = "SELECT * FROM examine_user WHERE id = $id";
			$res = Yii::$app->db->createCommand($sql)->queryOne();
		}
        return $this->render('register',['list'=>$res]);
    }
    // 注册
    public function actionRegister_2(){
    	$id = '';
    	$res = ['name'=>'','birthday'=>'','address'=>''];
    	if ($_POST) {
    		$request = Yii::$app->request;
			$post = $request->post();

			$sql= "INSERT INTO examine_user (cellphone, pas) VALUES ('".$post['cellphone']."','".$post['pas']."')";
			$res=Yii::$app->db->createCommand($sql)->execute();

			$sql= "SELECT id FROM examine_user ORDER BY id DESC";
			$res=Yii::$app->db->createCommand($sql)->queryOne();
			$id = $res['id'];
    	}else{
    		
			if ($id  = $request->get('id')) {
				$sql = "SELECT * FROM examine_user WHERE id = $id";
				$res = Yii::$app->db->createCommand($sql)->queryOne();
			}
    	}
    	

        return $this->render('register_2',['id'=>$id,'list'=>$res]);
    }
    // 注册
    public function actionRegister_3(){
    	
    		$request = Yii::$app->request;
			$post = $request->get();

			$sql='UPDATE examine_user SET name = "'.$post['name'].'",birthday = "'.$post['birthday'].'",address = "'.$post['address'].'" WHERE id = '.$post['id'];
			$res = Yii::$app->db->createCommand($sql)->execute();
			// var_dump($res);exit;
			// $id = $post['id'];
    	
    		
			
    	




        return $this->render('register_3',['id'=>$post['id']]);
    }
    public function actionZo(){
	    	$request = Yii::$app->request;
			$post = $request->get();

			$sql='UPDATE examine_user SET hobby = "'.$post['hobby'].'" WHERE id = '.$post['id'];
			$res = Yii::$app->db->createCommand($sql)->execute();
			echo "注册完成";
 		// $this->redirect(['examine/'.$post['xia'].'&id='.$res['id']]);// 跳转
    	
    }
    public function actionOz(){
    	
    	var_dump($this->arr);
 		// $this->redirect(['examine/'.$post['xia'].'']);// 跳转
    	
    }

}
