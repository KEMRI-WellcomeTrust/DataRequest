<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ProjectSearch;
use app\models\Project;
use app\utilities\DataHelper;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($status = '')
    {
        
        if(!Yii::$app->user->isGuest){
            $org_id = Yii::$app->user->identity->org_id;
            $role = Yii::$app->user->identity->role;
            $searchModel = new ProjectSearch();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
<<<<<<< HEAD
            
            /* if($status){
=======
            if($status){
>>>>>>> 4851e45aadad66378845c561f0293501f3bc1f8d
                $status_query = Project::getStatusQuery($status);
            }
            else{
                $status = "submitted";
                $status_query = Project::getStatusQuery($status);
                $dataProvider->query->andWhere($status_query);
            }
<<<<<<< HEAD
            

            $dataProvider->query->andWhere($status_query);   #->query->andWhere(" active = 1 ")
                         #archived
            ***/
            
=======
            $dataProvider->query->andWhere($status_query)->orderBy(['id'=>SORT_DESC]);   #->query->andWhere(" active = 1 ")
                         #archived
          
>>>>>>> 4851e45aadad66378845c561f0293501f3bc1f8d
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'status' => $status
            ]);
        }
        else{
            return $this->redirect(['site/login']);
        }
    }
 
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            Yii::$app->user->login($model->getUser(), $model->rememberMe ? 3600*24*30 : 0);
            //update last login stamp.
            Yii::$app->user->identity->loginStamp();
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays Forgot Password Form.
     *
     * @return string
     */
    public function actionForgotpass()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new \app\models\User();
        $dh = new \app\utilities\DataHelper;
        $keyword = "forgotpass";
        
        
        if ($model->load(Yii::$app->request->post()) ) {
            
            Yii::$app->session->setFlash('forgotpasswordFormSubmitted');

            if($model->forgotPass()){
                return array(
                    'status'=>'', 
                    'message'=>"Success Message",
                    'div'=>"Check your email for password reset link. Click on the link to continue.",
                    'gridid'=>'',
                    'alert_div'=>''
                );
            }
            else{
                return array(
                    'status'=>'', 
                    'message'=>"Success Message",
                    'div'=>"The email address you provided was not found. Please contact your administrator.",
                    'gridid'=>'',
                    'alert_div'=>''
                );
                
            }

            
        }
        $message = "Fill the form below to continue.";
        
        $form = $this->renderAjax('forgotpass', ['model'=>$model]);
        return array(
            'status'=>'', 
            'message'=>$message,
            'div'=>$form,
            'gridid'=>'',
            'alert_div'=>''
        );
    }

    public function actionResetpass($id){
        $user = new \app\models\User;
        $model = $user->findone($id);
        $dh = new DataHelper;
        $keyword = 'user';
        $model->checkpass = 1;
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            if (Yii::$app->request->isAjax)
            {   
                return $dh->processResponse($this, $model, 'setpassform', 'success', 'Successfully Saved!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);                
            }
        } else {
            if (Yii::$app->request->isAjax)
            {
                return $dh->processResponse($this, $model, 'setpassform', 'danger', 'Please fix the below errors!', 'pjax-'.$keyword, $keyword.'-form-alert-'.$model->id);   
            }
            else{
                return $this->render('setpassform', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionArchive()
    {
        
        if(!Yii::$app->user->isGuest){
            
            $searchModel = new ProjectSearch();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere(" active = 0 OR active IS NULL "); #archived
          
            return $this->render('archive', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            return $this->redirect(['site/login']);
        }
    }
   
}
