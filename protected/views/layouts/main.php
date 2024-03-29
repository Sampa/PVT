<!DOCTYPE html>
<html lang="sv">
<!---$lang = $_GET['lang'];//Yii::app()->language;
echo $lang.'<br/>';
Yii::app()->setLanguage($lang);
echo Yii::t(:-))--->
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/libs/bootstrap/assets/ico/favicon.png">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title><?php  echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Bootstrap core assets  are  registered by Yii in components/Controller.php -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl;?>/favicon.ico">
</head>
<body>
<?php  if (app()->params->render_switch_form): ?>
    <div id="switchform-container">
        <?php $this->renderPartial('/layouts/_switch');?>
    </div>
<?php endif;?>

<?php  echo $content; ?>
</body>
</html>
