<?php $this->beginContent('/layouts/main'); ?>
    <meta charset="UTF-8">
    <html lang="sv">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <a class="navbar-brand" href="<?php echo Yii::app()->getHomeUrl();?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>n cpslass="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::app()->getHomeUrl();?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel' => true,
                    'items' => array(
                        array('label' => Yii::t("t","Om oss"), 'url' => array('/site/page', 'view' => 'about')),
                        array('label' => Yii::t("t",'Kontakt'), 'url' => array('/site/contact')),
                        array('label' => Yii::t("t",'Hitta CV'), 'url'=>array('/cv/')),
                        array('visible'=>!Yii::app()->user->isGuest,'label' => yii::app()-> user-> name, 'url' => array('#'), 'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                            'submenuOptions' => array('class' => 'dropdown-menu'),
                            'items' => array(
                                array('label' => Yii::t("t",'Skapa nytt cv'), 'url' => array('/cv/create')),
                                array('label' => Yii::t("t",'Dina CV:n'), 'url' => array('/cv/admin')),
                                array('label' => Yii::t("t","Logga ut"), 'url' => array('/site/logout')),
                                array('label' => 'Something else here', 'url' => array('#'), 'itemOptions' => array('class' => 'divider')),
                                array('label' => 'Nav header', 'url'
                                => array('#'), 'itemOptions' => array('class' => 'dropdown-header')),
                                array('label' => 'Separated link', 'url' => array('#')),
                                array('label' => 'One more separated link', 'url' => array('#')),
                            )
                        )
                    ),
                    // 'htmlOptions'=>array('class'=>'main-menu')
                    'htmlOptions' => array('class' => 'nav navbar-nav')
                )); ?>
                <?php if (app()->user->isGuest): ?>
                    <?php
                    $model = new LoginForm();
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'nav-bar_login-form',
                        'enableClientValidation' => true,
                        'action' => $this->createUrl('site/login'),
                        //'enableAjaxValidation'=>true,
                        'errorMessageCssClass' => 'has-error',
                        'htmlOptions' => array(
                            'id' => 'login-form',
                            'class' => 'navbar-form navbar-right',
                            'role' => 'form',
                        ),
                        'clientOptions' => array(
                            'id' => 'nav-bar_login-form',
                            'validateOnSubmit' => true,
                            'errorCssClass' => 'has-error',
                            'successCssClass' => 'has-success',
                            'inputContainer' => '.form-group',
                            'validateOnChange' => true
                        ),
                    ));
                    ?>
                    <form>
                        <div class="form-group">
                            <?php echo $form->textField($model, 'username', array('max-length' => '10', 'class' => 'form-control', 'placeholder' => Yii::t("t","email eller användarnamn"))); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->passwordField($model, 'password', array('max-length' => '10', 'class' => 'form-control', 'type' => 'password', 'placeholder' => Yii::t("t","lösenord"))); ?>
                        </div>

                        <?php echo CHtml::submitButton( Yii::t("t",'Logga in'), array('class' => 'btn btn-primary btn-sm')); ?>
                        <a class="btn btn-primary  btn-sm  btn-warning"
                           href="<?php echo $this->createUrl('site/email_for_reset') ?>"><?php echo Yii::t("t", "Glömt lösenord");?></a>
                        <a class=" btn btn-primary btn-sm  btn-info"
                           href="<?php echo $this->createUrl('site/register') ?>"><?php echo Yii::t("t", "Registrera dig");?></a>

                        <?php $this->endWidget(); ?>
                    </form>

                <?php else: ?>
                    <div class=" navbar-right">
                        <span class="navbar-brand"><small><?php echo Yii::t("t","Välkommen")." ".Yii::app()->user->name; ?></small></span>
                            <span class="navbar-brand">
                                <a class="navbar-right" style="color:#ffffff" href="<?php echo $this->createUrl('site/logout') ?>">
                                    <small><?php echo Yii::t("t","Logga ut");?></small>
                                </a></span>
                    </div>
                <?php endif;?>
            </div>
            <!--/.navbar-collapse -->
        </div>
        <!--/.container -->
    </div><!--/.navbar -->
    <div class="container">
        <?php if(sizeof($this->breadcrumbs)>0): ?>
        <div class="row" style="margin-top: 20px;">
            <?php echo TbHtml::breadcrumbs($this->breadcrumbs);?>
        </div>
        <?php endif;?>
        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) :?>
            <?php foreach ($flashMessages as $key => $message)  : ?>
                <div class="alert alert-dismissable alert-<?php echo $key; ?>">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo   $message;?></strong>
                </div>
            <?php endforeach; ?>
        <?php endif;?>

        <?php echo $content; ?>
        <!-- Example row of columns -->
        <hr>

        <footer>

            <p>&copy; Company 2013</p>
        </footer>
    </div> <!-- /container -->
<?php $this->endContent(); ?>
<?php cs()->registerCssFile($this->getBootstrap3LayoutCssFileURL()); ?>

<style>
    .breadcrumb .active{
        color:#454A49;
    }
</style>