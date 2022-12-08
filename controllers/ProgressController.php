<?php

namespace app\controllers;

use Yii;
use app\models\Progress;
use app\models\ProgressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\utilities\DataHelper;
use yii\web\Response;
use yii\helpers\Url;
use app\models\Message;
use app\models\User;
use kartik\mpdf\Pdf;


/**
 * ProgressController implements the CRUD actions for Progress model.
 */
class ProgressController extends Controller
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
     * Lists all Progress models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Progress model.
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
     * Creates a new Progress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($project_id, $flag=0)
    {
        $model = new Progress();
        $dh = new DataHelper;
        $keyword = 'progress';
        $model->submitted_by = Yii::$app->user->identity->id;

       if($project_id){
            $model->fk_project = $project_id;
        }
        
        if($model->load(Yii::$app->request->post()) && $model->save()){
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {
                $message = "Successfully submitted progress";
                return $dh->processResponse($this, $model, 'create', 'success', $message, 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);
                            
            }
                
           else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
    
        }
        else{ #having POST related issues
            $message = 'Fix the below errors! <br/>'.print_r($model->getErrors(), true);
            return $dh->processResponse($this, $model, 'create', 'danger', $message, 'pjax-'.$keyword, $keyword.'-form-alert-0');
            exit; 
        }
    }

    /**
     * Updates an existing Progress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dh = new DataHelper;
        $keyword = 'progress';
   
        if ( $model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {   
                #return json_encode($this->renderAjax('update', ['model' => $model]));
                $model->afterFind();
                return $dh->processResponse($this, $model, 'update', 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);                
            }
            else{
                return $this->render('update', [
                    'model' => $model,
                ]);
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
     * Deletes an existing Progress model.
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
     * Finds the Progress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Progress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Progress::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpload(){
        
        $tmp_name = $_FILES['progress-attach_file']["tmp_name"];   
        $temp = $_FILES["progress-attach_file"]["name"];
        
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
        $this->refresh();

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
            'options' => ['title' => $model->title],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Analysis & Data Request App'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
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
                return $dh->processResponse($this, new Progress, $keyword, 'success', 'Deleted Successfully!', 'pjax-progress', $keyword.'-form-alert-id');
            }
            else{

                if(Yii::$app->request->post()){
                    //mark for deletion by admin
                    $model->save();
                    return $dh->processResponse($this, $model, $keyword, 'success', 'Nothing to do.', 'pjax-progress', $keyword.'-form-alert-id');
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
                return $dh->processResponse($this, $model, $keyword, 'success', $message, 'pjax-progress', $keyword.'-form-alert-id');
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


}
