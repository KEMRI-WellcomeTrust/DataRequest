<?php

namespace app\controllers;

use Yii;
use app\models\ProjectUser;
use app\models\ProjectUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\utilities\DataHelper;
use yii\web\Response;
use yii\helpers\Url;

/**
 * ProjectUserController implements the CRUD actions for ProjectUser model.
 */
class ProjectUserController extends Controller
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
     * Lists all ProjectUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectUser model.
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
     * Creates a new ProjectUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($project_id)
    {
        $model = new ProjectUser();
        $dh = new DataHelper;
        $keyword = 'project-user';
        if($project_id){
            $model->project_id = $project_id;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {
               Yii::$app->response->format = Response::FORMAT_JSON;
               
                return array(
                    'status'=>"success", 
                    'message'=>"Successfully created project-user",
                    'div'=>"Successfully created project-user.",
                    'gridid'=>"pjax-project-user",
                    'alert_div'=>"project-user-form-alert-0"
                    );              
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
     * Updates an existing ProjectUser model.
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
        $keyword = 'project-user';
   
        if ( $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {   
                #return json_encode($this->renderAjax('update', ['model' => $model]));
                $model->afterFind();
                return $dh->processResponse($this, $model, $keyword, 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);                
            }
        } else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, $keyword, 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing ProjectUser model.
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

    /**
     * Finds the ProjectUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
