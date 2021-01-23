<?php

namespace app\controllers;

use Yii;
use app\models\DataRequest;
use app\models\DataRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\utilities\DataHelper;
use yii\web\Response;
use yii\helpers\Url;
use app\models\ProjectUser;

/**
 * DataRequestController implements the CRUD actions for DataRequest model.
 */
class DataRequestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DataRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DataRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataRequest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        $dh = new DataHelper;
        $keyword = 'data-request';
        $model = $this->findModel($id);

        // return $this->render('view', ['model' => $this->findModel($id),]);
       
        return $dh->processResponse($this, $model, 'view', 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$id); 
    }

    /**
     * Creates a new DataRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($project_id)
    {
        $model = new DataRequest();
        $dh = new DataHelper;
        $keyword = 'data-request';
        if($project_id){
            $model->project_id = $project_id;
        }
        $model->status = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {
                $message = 'Successfully created data request <br/>';
                $projectUser = new ProjectUser();
                $projectUser->project_id = $model->project_id;
                return $dh->processResponse($this, $projectUser, '//project-user/create', 'success', $message, 'pjax-'.$keyword, $keyword.'-form-alert-0');
               exit;              
            }
            
        } else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'create', 'danger', 'Please fix the below errors!', 'pjax-'.$keyword, $keyword.'-form-alert-0');
               exit; 
                     
            }
            else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        
    }

    /**
     * Updates an existing DataRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $model->load(Yii::$app->request->post());
        $keyword = 'data-request';
   
        if ( $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {   
                #return json_encode($this->renderAjax('update', ['model' => $model]));
                $model->afterFind();
                return $dh->processResponse($this, $model, 'update', 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);                
            }
        } else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'update', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing DataRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataRequest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
        public function actionCustomdelete($id){
        
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $model->load(Yii::$app->request->post());
        $keyword  = "customdelete";
        
        if(Yii::$app->user->identity->isAdmin()){
            if($model->flag_delete == 2){
                //safe to delete this.
                $model->customDelete();
                return $dh->processResponse($this, new Beneficiary, $keyword, 'success', 'Deleted Successfully!', 'pjax-beneficiary', $keyword.'-form-alert-id');
            }
            else{

                if(Yii::$app->request->post()){
                    //mark for deletion by admin
                    $model->save();
                    return $dh->processResponse($this, $model, $keyword, 'success', 'Nothing to do.', 'pjax-beneficiary', $keyword.'-form-alert-id');
                }
                else{
                    //ask if okay to delete first.
                    $message = "Are you sure you want to delete?";
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    $form = $this->renderAjax('customdelete', ['model' => $model]);
                    return array(
                        'status'=>'', 
                        'message'=>$message,
                        'div'=>$form,
                        'gridid'=>'',
                        'alert_div'=>''
                    );
                }
            }
        }
        else{
            if(Yii::$app->request->post()){
                //mark for deletion by admin
                $message = $model->flag_delete == 2?"Marked for deletion by admin.":"No action!";
                $model->save();
                return $dh->processResponse($this, $model, $keyword, 'success', $message, 'pjax-beneficiary', $keyword.'-form-alert-id');
            }
            else{
                //ask if okay to delete first.
                $message = "Are you sure you want to delete?";
                Yii::$app->response->format = Response::FORMAT_JSON;
                $form = $this->renderAjax('customdelete', ['model' => $model]);
                return array(
                    'status'=>'', 
                    'message'=>$message,
                    'div'=>$form,
                    'gridid'=>'',
                    'alert_div'=>''
                );
            }
            
        }
        

    }

    public function actionReview($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;

        $current_review = $model->review_comments;
        $keyword = 'project';
        if($model->load(Yii::$app->request->post())){
            $model->review_date = date("Y-m-d");
            $model->reviewed_by = (string)Yii::$app->user->identity->id;
            $model->review_comments = $model->setReview($current_review);
    
            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {   
                    #return json_encode($this->renderAjax('update', ['model' => $model]));
                    $model->afterFind();
                    Yii::$app->response->format = Response::FORMAT_JSON;            
                    return array(
                        'status'=>"success", 
                        'message'=>"Successfully saved review",
                        'div'=>"Successfully saved review",
                        'gridid'=>"pjax-project",
                        'alert_div'=>"data-request-form-alert-0"
                        );                             
                }
            }
        }
         else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'review', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('review', [
                    'model' => $model,
                ]);
            }
        }
    }

/**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $keyword = 'project';
        if($model->load(Yii::$app->request->post())){
            $model->approved_date = date("Y-m-d");
            $model->approved_by = (string)Yii::$app->user->identity->id;

            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {   
                    #return json_encode($this->renderAjax('update', ['model' => $model]));
                    $model->afterFind();
                    return $dh->processResponse($this, $model, 'view', 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);               
                }
            }
        }
        else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'approve', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('approve', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionAssign($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $keyword = 'project';
        if($model->load(Yii::$app->request->post())){
            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {   
                    #return json_encode($this->renderAjax('update', ['model' => $model]));
                    $model->afterFind();
                    return $dh->processResponse($this, $model, 'view', 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);               
                }
            }
        }
        else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'assign', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('assign', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionIssue($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $keyword = 'project';
        if($model->load(Yii::$app->request->post())){

            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {   
                    #return json_encode($this->renderAjax('update', ['model' => $model]));
                    $model->afterFind();
                    return $dh->processResponse($this, $model, 'view', 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);               
                }
            }
        }
        else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'issue', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('issue', [
                    'model' => $model,
                ]);
            }
        }
    }

}
