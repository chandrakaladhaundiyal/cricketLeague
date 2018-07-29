<?php

class PlayerController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $viewId=null;
    public $viewData=null;
    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'admin', 'create', 'update', 'delete'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Player;

        if (isset($_POST['Player'])) {
            echo CActiveForm::validate($model);
            $uploadedFileName = TeamHelper::uploadImage($model,$_POST['Player']['first_name'],'image');
            if(!empty($uploadedFileName)){
                $model->attributes = $_POST['Player'];
                $model->created_at = date('Y:m:d H:i:s');
                $model->image = $uploadedFileName;
                if ($model->validate() && $model->save()) {
                    Yii::app()->user->setFlash('success', "Player saved successfully!");
                    $this->redirect(array('admin'));
                } else {
                    $model->addError('common_error','Error in saving Player!');
                }
            } else {
                $model->addError('common_error','Error in uploading logo!');
            }
          
            
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $parser = new CHtmlPurifier(); //create instance of CHtmlPurifier
        $id = $parser->purify($id); //we purify the $id

        $model = $this->loadModel($id);

        $oldImageName = $model->image;

        if (isset($_POST['Player'])) {
            $model->attributes = $_POST['Player'];
            $uploadedFileName = TeamHelper::uploadImage($model,$_POST['Player']['first_name'],'image');
            if(!empty($uploadedFileName)){
                if(file_exists(Yii::app()->basePath.'/../themes/images/player_images/'.$oldImageName))
                    unlink(Yii::app()->basePath.'/../themes/images/player_images/'.$oldImageName);
                $model->image = $uploadedFileName;
            }else{
                 $model->image = $oldImageName;
            }

            $model->updated_at = date('Y:m:d H:i:s');

            if($model->image == ''){
                $model->addError('image','Image can not be blank!');
            }
            elseif($model->save(false)){
                Yii::app()->user->setFlash('success', "Player updated successfully!");
                $this->redirect(array('admin'));
            }else {
                $model->addError('common_error','Error in updating player!');
            }            
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try{
            $parser = new CHtmlPurifier(); //create instance of CHtmlPurifier
            $id = $parser->purify($id); //we purify the $id

            $model = $this->loadModel($id);

            if(file_exists(Yii::app()->basePath.'/../themes/images/player_images/'.$model->image))
                        unlink(Yii::app()->basePath.'/../themes/images/player_images/'.$model->image);

            $model = $model->delete();
                if(!isset($_GET['ajax']))
                    Yii::app()->user->setFlash('success','Player Deleted Successfully');
                else
                    echo "<div class='flash-success'>Player Deleted Successfully</div>";
        }catch(CDbException $e){
            if(!isset($_GET['ajax']))
                Yii::app()->user->setFlash('error','Error in deleting Player');
            else
                echo "<div class='flash-error'>Error in deleting Player"; //for ajax
        }
                                
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin')); 
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Player('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Player']))
            $model->attributes = $_GET['Player'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Player the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Player::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Player $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'player-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*
     * Override of render to enable unit testing of controller
     * */
    public function render($view,$data=null,$return=false)
    {
            $this->viewId = $view;
            $this->viewData = $data;
            
            /* if the component 'fixture' is defined we are probably in the test environment */
            if(!Yii::app()->hasComponent('fixture')){
                    parent::render($view,$data,$return);
            }
            
    }

}
