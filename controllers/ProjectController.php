<?php

namespace app\controllers;

use Yii;
use app\models\Project;
use app\models\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\utilities\DataHelper;
use yii\web\Response;
use yii\helpers\Url;
use app\models\DataRequest;
use app\models\Message;
use app\models\User;
use kartik\mpdf\Pdf;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex($id=0)
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
        $dh = new DataHelper;
        $keyword = 'project';
        $model->request_status = 1;

        if ($model->load(Yii::$app->request->post()) ) {

            if($model->file_url){
                $model->sap = $model->file_url;
            }
            
            if($model->save()){
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {
                    $message = 'Successfully created project <br/>';
                    $dataRequest = new DataRequest();
                    $dataRequest->project_id = $model->id;
                    return $dh->processResponse($this, $dataRequest, '//data-request/create', 'success', $message, 'pjax-'.$keyword, $keyword.'-form-alert-0');
                exit;           
                }
            }
            else{
                $message = 'Please fix the below errors! <br/>'.print_r($model->getErrors(), true);
                return $dh->processResponse($this, $model, 'create', 'danger', $message, 'pjax-'.$keyword, $keyword.'-form-alert-0');
               exit; 
            }
        } else {
            if (Yii::$app->request->isAjax)
            {
               $message = 'Please fix the below errors! <br/>'.print_r($model->getErrors(), true);
                return $dh->processResponse($this, $model, 'create', 'danger', $message, 'pjax-'.$keyword, $keyword.'-form-alert-0');
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
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $keyword = 'project';
        $model->request_status = $model->setRequestStatus(); //resubmitted.
        $sap = $model->sap;

        if($model->load(Yii::$app->request->post())){
            
            if($model->file_url){
                $model->sap = $model->file_url;
            }else{
                $model->sap = $sap;
            }
            
            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {   
                    #return json_encode($this->renderAjax('update', ['model' => $model]));
                    $model->afterFind();
                    Yii::$app->response->format = Response::FORMAT_JSON;
                   $url = Url::to(['project/index', 'id' => $model->id]);
                   $redirect = <<<DOC
                         <script>
                           window.location.replace("$url");
                           </script>
DOC;
                   
                    return array(
                        'status'=>"success", 
                        'message'=>"Successfully updated project",
                        'div'=>"Successfully updated project...", //.$redirect
                        'gridid'=>"pjax-project",
                        'alert_div'=>"project-form-alert-0"
                        );                
                }
            }
            else{
                return $dh->processResponse($this, $model, 'update', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            } 
        }
        else {
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
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionReview($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;

        $current_review = $model->review_notes;
        $keyword = 'project';
        if($model->load(Yii::$app->request->post())){
            $model->date_review = date("Y-m-d");
            $model->request_reviewed_by = (string)Yii::$app->user->identity->id;
            $model->review_notes = $model->setReview($current_review);
            
            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {   
                    $model->afterFind();
                    #send email alert
                    $from =User::getFrom($model->request_reviewed_by);
                    $to = User::getTo($model->user_id);
                    $subject = "New Review Comment";
                    $project_id = $model->id;
                    $message = "We have recieved a review comment about your analysis request. Please login to view the details.";
                    Message::sendMessage($from, $to, $subject, $message, $project_id);
                    
                    Yii::$app->response->format = Response::FORMAT_JSON;
                $url = Url::to(['project/index', 'id' => $model->id]);
                $redirect = <<<DOC
                        <script>
                        window.location.replace("$url");
                        </script>
DOC;
                
                    return array(
                        'status'=>"success", 
                        'message'=>"Successfully reviewed project",
                        'div'=>"Successfully reviewed project...".$redirect,
                        'gridid'=>"pjax-project",
                        'alert_div'=>"project-form-alert-0"
                        );                 
                }
            }
            else{
                return $dh->processResponse($this, $model, 'review', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
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
            $model->date_approved = date("Y-m-d");
            $model->request_approved_by = Yii::$app->user->identity->id;
            
            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {
                    #send email alert
                    $from =User::getFrom($model->request_approved_by);
                    $to = User::getTo($model->user_id);
                    $subject = "Analysis Request Update";
                    $project_id = $model->id;
                    $message = "An approval update was posted on your analysis request. Please login to view the details. ";
                    Message::sendMessage($from, $to, $subject, $message, $project_id);

                    #return json_encode($this->renderAjax('update', ['model' => $model]));
                    $model->afterFind();
                    Yii::$app->response->format = Response::FORMAT_JSON;
                $url = Url::to(['project/index', 'id' => $model->id]);
                $redirect = <<<DOC
                        <script>
                        window.location.replace("$url");
                        </script>
DOC;
                
                    return array(
                        'status'=>"success", 
                        'message'=>"Successfully created project",
                        'div'=>"Successfully created project...".$redirect,
                        'gridid'=>"pjax-project",
                        'alert_div'=>"project-form-alert-0"
                        );                 
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

    /**
     * Deletes an existing Project model.
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

    public function actionStatusupdate($id){
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
                    Yii::$app->response->format = Response::FORMAT_JSON;

                    #send email alert
                    $from =User::getFrom(Yii::$app->user->identity->id);
                    $to = User::getTo($model->user_id);
                    $subject = "Analysis Request Update";
                    $project_id = $model->id;
                    $message = "The data team have posted an update on the status of your data request. Login to check the details. ";
                    Message::sendMessage($from, $to, $subject, $message, $project_id);
                
                    return array(
                        'status'=>"success", 
                        'message'=>"Successfully updated project status",
                        'div'=>"Successfully updated project status.",
                        'gridid'=>"pjax-project",
                        'alert_div'=>"project-form-alert-0"
                        );                 
                }
            }
            else{
                return $dh->processResponse($this, $model, 'status', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
        }
         else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'status', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('status', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionComplete($id){
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $keyword = 'project';
        if($model->load(Yii::$app->request->post())){
            if($model->completed == 1){
                $model->active = 0;
            }
            if ( $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                if (Yii::$app->request->isAjax)
                {   
                    #return json_encode($this->renderAjax('update', ['model' => $model]));
                    $model->afterFind();
                    Yii::$app->response->format = Response::FORMAT_JSON;

                    #send email alert
                    $from =User::getFrom(Yii::$app->user->identity->id);
                    $to = User::getTo($model->user_id);
                    $subject = "Analysis Request Update";
                    $project_id = $model->id;
                    $message = "The data team have posted an update on the status of your data request. Login to check the details. ";
                    Message::sendMessage($from, $to, $subject, $message, $project_id);
                
                    return array(
                        'status'=>"success", 
                        'message'=>"Successfully updated project status",
                        'div'=>"Successfully updated project status.",
                        'gridid'=>"pjax-project",
                        'alert_div'=>"project-form-alert-0"
                        );                 
                }
            }
            else{
                return $dh->processResponse($this, $model, 'complete', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
        }
         else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'complete', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('status', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpload(){
        
        $tmp_name = $_FILES['project-sap']["tmp_name"];   
        $temp = $_FILES["project-sap"]["name"];
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if(move_uploaded_file($tmp_name, "uploads/$temp")){
            return array(
            'div'=>"<span class='success'> Uploaded Successfully </span>",
             'val'=>$temp
            );
        }
        else{
            return array(
            'div'=>"Oops! An Error Occured",
            );
        }
       
    }

    public function actionDownload($file_name){

        $path = Yii::getAlias('@webroot') . '/uploads';
        $file = $path . '/'.$file_name;

        if (file_exists($file)) {

        Yii::$app->response->sendFile($file);

        }
    }

    public function actionArchive($id){
        $model = $this->findModel($id);
        if($model){
            if($model->active == 1){
                $model->active = 0;
                $model->save(false);
            }
            else{
                $model->active=1;
                $model->save(false);
            }
            
        }

        return $this->redirect(['index','id'=>$model->id]);
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

    public function actionReport($id) {
        return $this->redirect(['get-report','id'=>$id]);
    }
    public function actionGetReport($id){
        // get your HTML raw content without any layouts or scripts
        $model = $this->findModel($id);
        $content = $this->renderPartial('view-report',['model' =>$model ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => $model->project_name],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Analysis & Data Request App'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
}
