<?php $this->beginContent('/layouts/main'); ?>
    <meta charset="UTF-8">
    <html lang="sv">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::app()->getHomeUrl();?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php
                if(Yii::app()->user->getState("role")== "publisher"){
                $items = array(
                    array('label' => Yii::t("t",'Mina sidor'), 'url' => array('/user/'.Yii::app()->user->id)),
                    array('label' => Yii::t("t",'Skapa nytt cv'), 'url' => array('/cv/create')),
                    array('label' => Yii::t("t",'Dina CV:n'), 'url' => array('/cv/admin')),
                    array('label' => Yii::t("t", "Ändra uppgifter"), 'url' => array('/user/update/'.Yii::app()->user->id)),

                );}else{
                $items = array(
                    array('label' => Yii::t("t",'Mina sidor'), 'url' => array('/user/'.Yii::app()->user->id)),
                    array('label' => Yii::t("t","Mina rekryteringsprocesser"), 'url' => array('/recruitmentprocess/')),
                    array('label' => Yii::t("t",'Ny rekryteringsprocess'), 'url' => array('/recruitmentprocess/create')),
                    array('label' => Yii::t("t",'Ny enkät'), 'url' => array('/survey/create')),
                    array('label' => Yii::t("t",'Hitta CV'), 'url' => array('/cv/')),
                    array('label' => Yii::t("t", "Ändra uppgifter"), 'url' => array('/user/update/'.Yii::app()->user->id)),

                );}

                $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel' => true,
                    'items' => array(
                        array('label' => Yii::t("t",'Kontakt'), 'url' => array('/site/contact')),
                        array('label' => Yii::t("t",'Avancerad sökning'), 'url'=>array('/cv/')),
                        array('visible'=>!Yii::app()->user->isGuest,'label' => yii::app()-> user-> name, 'url' => array('#'), 'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                            'submenuOptions' => array('class' => 'dropdown-menu'),
                            'items' => $items,
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

        <footer id="footer2">
            <div class="container">
                <div class="row">

                    <br>
                    <div class="col-md-4">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/agreement"><img src="http://oi60.tinypic.com/w8lycl.jpg" class="img-circle" alt="the-brains"></a>
                            <br>
                            <h5 class="footertext"><a href="<?php echo Yii::app()->baseUrl;?>/site/page/agreement"><strong><?php echo yii:: t ("t", "Användaravtal");?></strong></a></h5>
                        </center>
                    </div>
                    <div class="col-md-4">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/pul"><img src="http://oi60.tinypic.com/2z7enpc.jpg" class="img-circle" alt="..."></a>
                            <br>
                            <h5 class="footertext"><a href="<?php echo Yii::app()->baseUrl;?>/site/page/pul"><strong><?php echo yii:: t ("t", "Personuppgifter");?></strong></a></h5>
                        </center>
                    </div>
                    <div class="col-md-4">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/cookies"><img src="http://oi61.tinypic.com/307n6ux.jpg" class="img-circle" alt="..."></a>
                            <br>
                            <h5 class="footertext"><a href="<?php echo Yii::app()->baseUrl;?>/site/page/cookies"><strong><?php echo YIi:: t("t","Cookies");?></strong></a></h5>
                        </center>
                    </div>
                </div>

<!--                        <a href="--><?php //echo Yii::app()->baseUrl;?><!--/site/contact">--><?php //echo Yii::t("t","Kontakt");?><!--</a><p class="footertext"></p></center></p>-->

            </div>
            <!--visar hela kontactformuläret-->
            <div id="contactFormWrapper" style="display: none;">
                <?php
                    $cat=Yii::app()->createController('site');//returns array containing controller instance and action index.
                    echo $cat[0]->actionContact(true);
                ?>
            </div>
        </footer>
    </div> <!-- /container -->
<?php $this->endContent(); ?>
<?php cs()->registerCssFile($this->getBootstrap3LayoutCssFileURL()); ?>

<style>
    #footer2{
        color: #000000;
        background:
      /* color overlay */
        linear-gradient(
        rgba(240, 212, 0, 0.45),
        rgba(0, 0, 0, 0.45)
        ),
        /* image to overlay */

    }
    .breadcrumb .active{
        color:#454A49;
      }

</style>w
<script>
    $(document).ready(function(){
    $("#showContactForm").on('click',function(){
        $("#contactFormWrapper").slideToggle();
        $('html, body').animate({
            scrollTop: $("#showContactForm").offset().top
        }, 2000);
        });
    });
</script>
