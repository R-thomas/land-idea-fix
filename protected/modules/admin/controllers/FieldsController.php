<?php

class FieldsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';
    const IMAGE_PATH = 'upload/images';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Fields;

		if(isset($_POST['Fields']))
		{
            $advantagesText = $_POST['advantagesText'];
            $advantagesImg = $this->loadImg('advantages');
            $advantages = [$advantagesText, $advantagesImg];

            $schemeText = $_POST['schemeText'];
            $schemeImg = $this->loadImg('scheme');
            $scheme = [$schemeText, $schemeImg];

            $clientsImg = $this->loadImg('clients');

            $feedbackDescriptionText = $_POST['feedbackDescriptionText'];
            $feedbackResultImg = $this->loadImg('feedbackResult');
            $feedbackText = $_POST['feedbackText'];
            $feedbackScreenImg = $this->loadImg('feedbackScreen');
            $feedback = [$feedbackDescriptionText, $feedbackResultImg, $feedbackText, $feedbackScreenImg];

            $model->title=$_POST['Fields']['title'];
            $model->advantages = json_encode($advantages, JSON_FORCE_OBJECT);
            $model->scheme = json_encode($scheme, JSON_FORCE_OBJECT);
            $model->clients = json_encode($clientsImg, JSON_FORCE_OBJECT);
            $model->feedback = json_encode($feedback, JSON_FORCE_OBJECT);

            if($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }

		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$title = $model->title;
        $advantages = $model->advantages;
        $scheme = $model->scheme;
        $clients = $model->clients;
        $feedback = $model->feedback;



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fields']))
		{

            $advantagesText = $_POST['advantagesText'];
            $advantagesImg = $this->loadImg('advantages');
            $advantagesOld = json_decode($advantages, true);
            $advantagesNew = [];
            foreach($advantagesImg as $key=>$img) {
                if($img == "") {
                    $advantagesNew[$key] = $advantagesOld[1][$key];
                } else {
                    $advantagesNew[$key] = $img;
                    unlink(self::IMAGE_PATH . "/" . $advantagesOld[1][$key]);
                }
            }
            $advantages = [$advantagesText, $advantagesNew];

            $schemeText = $_POST['schemeText'];
            $schemeImg = $this->loadImg('scheme');

            $schemeOld = json_decode($scheme, true);
            $schemeNew = [];
            foreach($schemeImg as $key=>$img) {
                if($img == "") {
                    $schemeNew[$key] = $schemeOld[1][$key];
                } else {
                    $schemeNew[$key] = $img;
                    unlink(self::IMAGE_PATH . "/" . $schemeOld[1][$key]);
                }
            }

            $scheme = [$schemeText, $schemeNew];

            $clientsImg = $this->loadImg('clients');

            $clientsOld = json_decode($clients, true);

            $clientsNew = [];
            foreach($clientsImg as $key=>$img) {
                if($img == "") {
                    $clientsNew[$key] = $clientsOld[$key];
                } else {
                    $clientsNew[$key] = $img;
                    unlink(self::IMAGE_PATH . "/" . $clientsOld[$key]);
                }
            }

            $feedbackDescriptionText = $_POST['feedbackDescriptionText'];
            $feedbackResultImg = $this->loadImg('feedbackResult');

            $feedbackOld = json_decode($feedback, true);
            $feedbackResultImgNew = [];
            foreach($feedbackResultImg as $key=>$img) {
                if($img == "") {
                    $feedbackResultImgNew[$key] = $feedbackOld[1][$key];
                } else {
                    $feedbackResultImgNew[$key] = $img;
                    unlink(self::IMAGE_PATH . "/" . $feedbackOld[1][$key]);
                }
            }

            $feedbackText = $_POST['feedbackText'];
            $feedbackScreenImg = $this->loadImg('feedbackScreen');

            $feedbackScreenImgNew = [];
            foreach($feedbackScreenImg as $key=>$img) {
                if($img == "") {
                    $feedbackScreenImgNew[$key] = $feedbackOld[3][$key];
                } else {
                    $feedbackScreenImgNew[$key] = $img;
                    unlink(self::IMAGE_PATH . "/" . $feedbackOld[3][$key]);
                }
            }

            $feedback = [$feedbackDescriptionText, $feedbackResultImgNew, $feedbackText, $feedbackScreenImgNew];

            $model->title=$_POST['Fields']['title'];
            $model->advantages = json_encode($advantages, JSON_FORCE_OBJECT);
            $model->scheme = json_encode($scheme, JSON_FORCE_OBJECT);
            $model->clients = json_encode($clientsNew, JSON_FORCE_OBJECT);
            $model->feedback = json_encode($feedback, JSON_FORCE_OBJECT);

            if($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Fields');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Fields('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Fields']))
			$model->attributes=$_GET['Fields'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Fields the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Fields::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Fields $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fields-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function loadImg($name) {
	    $name = $name . "Img";
        $$name = [];

        foreach($_FILES[$name]['name'] as $key=>$file) {
            if($_FILES[$name]['type'][$key] == 'image/jpeg') {
                ${$name}[$key] = DFileHelper::getRandomFileName(self::IMAGE_PATH, 'jpg') . '.jpg';
                $uploadfile = self::IMAGE_PATH . '/' . ${$name}[$key];
                if (!move_uploaded_file($_FILES[$name]['tmp_name'][$key], $uploadfile)) {
                    throw new CHttpException(520, 'Возможная атака с помощью файловой загрузки!');
                }
            } elseif ($_FILES[$name]['type'][$key] == '') {
                ${$name}[$key] = '';
            } else {
                throw new CHttpException(520, 'Неподдерживаемый формат файла. Файлы должны быть в формате "jpeg"');
            }
        }


        return $$name;
    }
}
