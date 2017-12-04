<?php
namespace frontend\controllers;

use Yii;
// use yii\base\InvalidParamException;
// use yii\web\BadRequestHttpException;
use yii\web\Controller;
// use yii\filters\VerbFilter;
// use yii\filters\AccessControl;
// use common\models\LoginForm;
// use frontend\models\PasswordResetRequestForm;
// use frontend\models\ResetPasswordForm;
// use frontend\models\SignupForm;
// use frontend\models\ContactForm;
use app\models\EntryForm;
// use app\models\User;

/**
 * Site controller
 */
class DemoController extends Controller
{
    public $enableCsrfValidation = false;

    // 实验
    public function actionOne(){
	    $sql  = "SELECT * FROM user";
	   	$query = Yii::$app->db->createCommand($sql)->queryAll();
        // var_dump($query);
        return $this->render('one',['list'=>$query]);
    }
    // 添加
    public function actionUser_add(){

        // 无论是初始化显示还是数据验证错误
        return $this->render('user_add');
        
    }
    // 添加 动作
    public function actionUser_add_do(){
        
		$arr=['name' => $_POST['name'],'pas' => $_POST['pass']];//（建议使用字段绑定）
		$re = Yii::$app->db->createCommand()->insert('user', $arr)->execute();
		if ($re == 1) {
			echo "成功";
         	// return $this->render('user_add');

		}

		// // UPDATE
		// $connection->createCommand()->update('user', ['status' => 1], 'age > 30')->execute();

		// // DELETE
		// $connection->createCommand()->delete('user', 'status = 0')->execute();

    }
    // 展示
    public function actionUser_show(){
    	$sql  = "SELECT * FROM user";
	   	$query = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('user_show',['list'=>$query]);
    }
    // 修改
    public function actionUser_update(){
        return $this->render('user_update',['u_id'=>$_GET['id']]);
    }
    // 修改 动作
    public function actionUser_update_do(){
    	$list = Yii::$app->db->createCommand()->update('user', ['name' => $_POST['name'],'pas'=>$_POST['pass'],], 'id = '.$_POST['u_id'])->execute();
    	if ($list == 1) {
			echo "修改成功";
		}
    }

   	// 删除
    public function actionUser_del(){
		$list = Yii::$app->db->createCommand()->delete('user', 'id = '.$_GET['id'])->execute();
    	if ($list == 1) {
			echo "删除成功";
		}
    }

    public function actionEntry()
    {
        $model = new EntryForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据
        	// $list = Yii::$app->request->post();
         	// return var_dump($list['EntryForm']);
            // var_dump($_POST['EntryForm']);exit;
            $name = $_POST['EntryForm']['name'];
		    $sql  = "SELECT * FROM user WHERE name = :name";
		   	$query = Yii::$app->db->createCommand($sql,[':name' => $name])->queryOne();
            var_dump($query);




            // 做些有意义的事 ...
            // var_dump($model);
            // return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }



}
