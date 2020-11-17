<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123796645-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-123796645-1');
    </script>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div  class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => "Analysis & Data Request App",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'id'=>'titleBar'
        ],
    ]);
    $dh = new \app\utilities\DataHelper();
    if(!Yii::$app->user->isGuest){
        $url = Url::to(['user/view','id'=>Yii::$app->user->identity->id]);
        $profile_btn =  $dh->getModalButton(Yii::$app->user->identity, "user/view", "Users", 'btn btn-info btn-margin','My Profile',$url,'Users');
    }
    else{
        $profile_btn = "";
    }
   
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            !Yii::$app->user->isGuest ? ['label' => 'Home', 'url' => ['/site/index'],'linkOptions' => ['class'=>'btn btn-info btn-margin']]:'',
            '<li>'.$profile_btn.'</li>',
            !Yii::$app->user->isGuest?
                Yii::$app->user->identity->isAdmin()  ? ['label' => 'Settings', 'url' => ['/user/index'],'linkOptions' => ['class'=>'btn btn-info btn-margin']]:''
               :"",
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login'],'linkOptions' => ['class'=>'btn btn-default']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                  "Hi ". Yii::$app->user->identity->username. ', (Logout)',
                    ['class' => 'btn btn-success logout']
                )
                . Html::endForm()
                . '</li>'
            )
            
        ],
        
            
        
    ]);
    NavBar::end();
    ?>

    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>

</div>
<?php 
 $url = Url::to('@web/js/jsLib.js', true);
$this->registerJsFile($url, ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/validations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

     <?php
       // Using a select2 widget inside a modal dialog
        Modal::begin([
            'options' => [
                'id' => 'modal_id',
                'backdrop' => 'static',
                'tabindex' => false // important for Select2 to work properly
            ],
            'header' => '<div id="modal_title_div"> <h4 style="margin:0; padding:0">Analysis Request </h4> </div>',
           // 'toggleButton' => ['label' => 'Show Modal', 'class' => 'btn btn-lg btn-primary'],
        ]);
       
        echo '<div class="modal-body" id="modal_body_div"> </div>';
          
        Modal::end();  
     ?>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; CHAIN NETWORK <?= date('Y') ?> </p>
        <p class="pull-right">Powered By CHAIN Central Data Team </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
