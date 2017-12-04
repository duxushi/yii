<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class AceController extends Controller
{
    // public $layout = false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    
    public function actionBlank()
    {
        return $this->render('blank');
    }

    public function actionButtons()
    {
        return $this->render('buttons');
    }

    public function actionCalendar()
    {
        return $this->render('calendar');
    }

    public function actionDropzone()
    {
        return $this->render('dropzone');
    }

    public function actionElements()
    {
        return $this->render('elements');
    }

    public function actionError_404()
    {
        return $this->render('error_404');
    }

    public function actionError_500()
    {
        return $this->render('error_500');
    }

    public function actionFaq()
    {
        return $this->render('faq');
    }

    public function actionForm_elements()
    {
        return $this->render('ace/form_elements');
    }

    public function actionForm_wizard()
    {
        return $this->render('form_wizard');
    }

    public function actionGallery()
    {
        return $this->render('gallery');
    }

    public function actionGrid()
    {
        return $this->render('grid');
    }

    public function actionInbox()
    {
        return $this->render('inbox');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionInvoice()
    {
        return $this->render('invoice');
    }

    public function actionJqgrid()
    {
        return $this->render('jqgrid');
    }

    public function actionJquery_ui()
    {
        return $this->render('jquery_ui');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionNestable_list()
    {
        return $this->render('nestable_list');
    }

    public function actionPricing()
    {
        return $this->render('pricing');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionTables()
    {
        return $this->render('tables');
    }

    public function actionTimeline()
    {
        return $this->render('timeline');
    }

    public function actionTreeview()
    {
        return $this->render('treeview');
    }

    public function actionTypography()
    {
        return $this->render('typography');
    }

    public function actionWidgets()
    {
        return $this->render('widgets');
    }

    public function actionWysiwyg()
    {
        return $this->render('wysiwyg');
    }

















}
