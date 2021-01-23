<?php

namespace app\controllers;

use Yii;
use app\models\Message;
use app\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Url;
use app\utilities\DataHelper;
use app\models\User;
use app\models\Project;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
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
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
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
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Message();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Message model.
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
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionBook($project_id='')
    {
        $model = new Message;
        $dh = new DataHelper;
        $keyword = 'message';
        if($project_id){
            $model->project_id = $project_id;
        }
        
        if($model->load(Yii::$app->request->post())){
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {
                $project_name = '';
                $project = Project::findone($model->project_id);
                if($project){
                    $project_name = $project->project_name;
                }
                $to = $model->msg_to;
                $time = $model->msg_from;
                $subject = $model->msg_subject;
                $body = $model->msg_body;
                $reviewers = User::getDataTeam();
                $current_user = Yii::$app->user->identity->id;
                foreach($reviewers as $reviewer){
                    if($current_user != $reviewer->id){
                        #send email alert
                        $from =User::getFrom(Yii::$app->user->identity->id);
                        $to = User::getTo($reviewer->id);
                    
                        $message = <<<EOF
Dear $to, <br/>
As a data team admin, a meeting has been requested to discuss analysis project titled: $project_name. The user left the following message: <br/>
$body
<br/> Please reach out to them and book the appointment.
EOF;

                        Message::sendMessage($from, $to, $subject, $message, $model->project_id);
                    }
                }
                
                Yii::$app->response->format = Response::FORMAT_JSON;
                return array(
                    'status'=>"success", 
                    'message'=>"Successfully sent meeting booking request",
                    'div'=>"Successfully sent meeting booking request",
                    'gridid'=>"pjax-project",
                    'alert_div'=>"message-form-alert-0"
                    );                 
            }
        
    }
    else {
        if (Yii::$app->request->isAjax)
        {
            return $dh->processResponse($this, $model, 'book', 'danger', 'Please fix the below errors!'.print_r($model->getErrors(),true), 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
        }
        else{
            return $this->render('book', [
                'model' => $model,
            ]);
        }
      }
    }
}
