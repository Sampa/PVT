<?php $this->beginContent('/layouts/main'); ?>
    <meta charset="UTF-8">
    <html lang="sv">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" style="margin-top:0px;" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::app()->getHomeUrl();?>">
                    <?php echo CHtml::encode(Yii::app()->name); ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php
                if(Yii::app()->user->id == 1){
                    $items = array(
	                   array('label' => t('Rapporterade CV:n'), 'url' => array('/reportedCv/'),'visible'=>!Yii::app()->user->isGuest),
	                   array('label' => t('Statistik'), 'url' => array('/user/statistics/'), 'visible'=>!Yii::app()->user->isGuest),
                  );
                }else if(Yii::app()->user->getState("role")== "publisher"){
	                $items = array(
	                    array('label' => Yii::t("t",'Skapa nytt CV'), 'url' => array('/cv/create'),'visible'=>!Yii::app()->user->isGuest,),
	                    array('label' => Yii::t("t",'Mina CV:n'), 'url' => array('/cv/admin'),'visible'=>!Yii::app()->user->isGuest,),
	                );
                }else{
                    $items = array(
	                    array('label' => Yii::t("t","Rekryteringsprocesser"), 'url' => array('/recruitmentprocess/'),'visible'=>!Yii::app()->user->isGuest,),
	                    array('label' => Yii::t("t","Enkäter"), 'url' => array('/survey/admin'),'visible'=>!Yii::app()->user->isGuest,),
                    );
                }

                //ska alltid synas
				$standardItems = array(
					array('label' => Yii::t("t",'Kontakt'), 'url' => array('/site/contact')),
					array('label' => Yii::t("t",'Sökning'), 'url'=>array('/cv/')),
                   // array('label' => Yii::t("t",'Hjälp'), 'url'=>array('/site/page/helpguide/')),
				);
                //slå ihop custom items med de som alltid syns
                $items = array_merge($standardItems,$items);
                $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel' => true,
                    'items' =>$items,
                    // 'htmlOptions'=>array('class'=>'main-menu')
                    'htmlOptions' => array('class' => 'nav navbar-nav')
                )); ?>


                <?php if (app()->user->isGuest): ?>
                    <span class="pull-right"><?php $this->widget("LangBox",array());?></span>

                    <?php
                    $model = new LoginForm();
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'nav-bar_login-form',
                        'enableClientValidation' => true,
                        'action' => $this->createUrl('site/login'),
                        'enableAjaxValidation'=>true,
//                        'errorMessageCssClass' => 'has-error',
                        'htmlOptions' => array(
                            'id' => 'login-form',
                            'class' => 'navbar-form',
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
                    <div class="form-group">
                        <?php echo $form->textField($model, 'username', array('max-length' => '10', 'class' => 'form-control', 'placeholder' => Yii::t("t","email eller användarnamn"))); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->passwordField($model, 'password', array('max-length' => '10', 'class' => 'form-control', 'type' => 'password', 'placeholder' => Yii::t("t","lösenord"))); ?>
                    </div>

                    <?php echo CHtml::submitButton( Yii::t("t",'Logga in'), array('class' => 'btn btn-primary btn-sm')); ?>
                    <a class="btn btn-primary  btn-sm  btn-warning"
                       href="<?php echo $this->createUrl('site/email_for_reset') ?>">
                        <?php echo Yii::t("t", "Glömt lösenord");?>
                    </a>
                    <a class=" btn btn-primary btn-sm  btn-info"
                       href="<?php echo $this->createUrl('site/register') ?>">
                        <?php echo Yii::t("t", "Registrera dig");?>
                    </a>
                    <?php $this->endWidget(); ?>
                <?php else: ?>
                <div class="navbar-right visible-xs" >
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::t("t"," ").Yii::app()->user->name; ?>
                                <span class="glyphicon glyphicon-arrow-down pull-rigth"></span>
                            </a>
                            <ul class="dropdown-menu" style="width:200px">
                                <li>
                                    <a href="<?php echo $this->createUrl('/user/')."/".Yii::app()->user->id ?>"><?php echo Yii::t("t","Mina Sidor");?>
                                        <span class="glyphicon glyphicon-heart pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <!--                            <a href="#">Meddelanden <span class="badge pull-right"> 42 </span></a>-->
                                    <!-- href leder till användarens inbox -->
                                    <a href="<?php echo $this->createUrl(Yii::app()->getModule('message')->defaultUrl[0]);?>"> <?php echo t("Meddelanden/ Enkäter");?>
                                        <span class="badge pull-right">
                                            <?php
                                            if(Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId())){
                                                echo ' (' . Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId()) . ')';
                                            }else{
                                                echo "";
                                            }
                                            ?>
                                        </span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/site/page/helpguide/')?>"><?php echo Yii::t("t","Användarguide");?>
                                        <span class="glyphicon glyphicon-question-sign pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/user/update')."/".Yii::app()->user->id ?>"><?php echo Yii::t("t","Ändra uppgifter");?>
                                        <span class="glyphicon glyphicon-cog pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/site/logout') ?>"><?php echo Yii::t("t","Logga ut");?>
                                        <span class="glyphicon glyphicon-log-out pull-right"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>


                       <!--  <span class="navbar-brand">
                            <a class="navbar-right" style="color:#ffffff" href="<?php echo $this->createUrl('site/logout') ?>">
                                <small><?php echo Yii::t("t","Logga ut");?></small>
                            </a>
                        </span> -->
                </div>
                <div class="navbar-right hidden-xs" >
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::t("t"," ").Yii::app()->user->name; ?>
                                <span class="glyphicon glyphicon-arrow-down pull-rigth"></span>
                            </a>
                            <ul class="dropdown-menu" style="width:200px">
                                <li>
                                    <a href="<?php echo $this->createUrl('/user/')."/".Yii::app()->user->id ?>"><?php echo Yii::t("t","Mina Sidor");?>
                                        <span class="glyphicon glyphicon-heart pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <!--                            <a href="#">Meddelanden <span class="badge pull-right"> 42 </span></a>-->
                                    <!-- href leder till användarens inbox -->
                                    <a href="<?php echo $this->createUrl(Yii::app()->getModule('message')->defaultUrl[0]);?>"> <?php echo t("Meddelanden/ Enkäter");?>
                                        <span class="badge pull-right">
                                            <?php
                                            if(Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId())){
                                                echo ' (' . Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId()) . ')';
                                            }else{
                                                echo "";
                                            }
                                            ?>
                                        </span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/site/page/helpguide/')?>"><?php echo Yii::t("t","Användarguide");?>
                                        <span class="glyphicon glyphicon-question-sign pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/user/update')."/".Yii::app()->user->id ?>"><?php echo Yii::t("t","Ändra uppgifter");?>
                                        <span class="glyphicon glyphicon-cog pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/site/logout') ?>"><?php echo Yii::t("t","Logga ut");?>
                                        <span class="glyphicon glyphicon-log-out pull-right"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="pull-right"><?php $this->widget("LangBox",array());?></span>

                       <!--  <span class="navbar-brand">
                            <a class="navbar-right" style="color:#ffffff" href="<?php echo $this->createUrl('site/logout') ?>">
                                <small><?php echo Yii::t("t","Logga ut");?></small>
                            </a>
                        </span> -->
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
	    <?php
        if($_SERVER['REQUEST_URI']!="/" && $_SERVER['REQUEST_URI']!="/Group1/"):?>
        <footer id="footer2 ">
            <div class="container visible-xs visible-sm">
                <div class="row">
                    <br>
                    <div class="col-md-3" align="center">
                        <a href="<?php echo Yii::app()->baseUrl;?>/site/page/helpguide">
                            <button type="button" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-link"></i></button>
                        </a>
                        <br>
                        <h4 class="footertext"><strong><?php echo yii:: t ("t", "Användarguide");?></strong></h4>

                    </div>
                    <div class="col-md-3">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/agreement">
                            <button type="button" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-book"></i></button>
                            </a>
                            <br>
                            <h4 class="footertext"><strong><?php echo yii:: t ("t", "Användaravtal");?></strong></h4>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/pul">
                        <button type="button" class="btn btn-warning btn-circle btn-xl"><i class="glyphicon glyphicon-folder-open"></i></button>
                            </a>
                            <br>
                            <h4 class="footertext"><strong><?php echo yii:: t ("t", "Personuppgifter");?></strong></h4>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                             <a href="<?php echo Yii::app()->baseUrl;?>/site/page/cookies">
                            <button type="button" class="btn btn-danger btn-circle btn-xl"><i class="glyphicon glyphicon-info-sign"></i></button>
                            </a>
                            <br>
                            <h4 class="footertext"><strong><?php echo yii:: t ("t", "Cookies");?></strong></h4>
                        </center>
                    </div>
                </div>
            </div>

        </footer>
        <!-- end if startpage-->
        <footer id="footer2 ">
            <div class="container visible-md visible-lg">
                <div class="row">
                    <br>
                    <div class="col-md-3" align="center">
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/helpguide">
                            <button type="button" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-link"></i></button>
                            </a>
                            <br>
                        <h4 class="footertext"><strong><?php echo yii:: t ("t", "Användarguide");?></strong></h4>

                    </div>
                    <div class="col-xs-3">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/agreement">
                            <button type="button" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-book"></i></button>
                            </a>
                            <br>
                            <h4 class="footertext"><strong><?php echo yii:: t ("t", "Användaravtal");?></strong></h4>
                        </center>
                    </div>
                    <div class="col-xs-3">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/pul">
                            <button type="button" class="btn btn-warning btn-circle btn-xl"><i class="glyphicon glyphicon-folder-open"></i></button>
                            </a>
                            <br>
                            <h4 class="footertext"><strong><?php echo yii:: t ("t", "Personuppgifter");?></strong></h4>
                        </center>
                    </div>
                    <div class="col-xs-3">
                        <center>
                            <a href="<?php echo Yii::app()->baseUrl;?>/site/page/cookies">
                            <button type="button" class="btn btn-danger btn-circle btn-xl"><i class="glyphicon glyphicon-info-sign"></i></button>
                            </a>
                            <br>
                            <h4 class="footertext"><strong><?php echo yii:: t ("t", "Cookies");?></strong></h4>
                        </center>
                    </div>
                </div>
            </div>

        </footer>
        <?php endif;?>
    </div> <!-- /container -->
<?php $this->endContent(); ?>
<?php cs()->registerCssFile($this->getBootstrap3LayoutCssFileURL()); ?>
<script>
    $(document).ready(function(){
        $("#chatButton").on('click',function(){
            $("#chatDiv").fadeIn();
        });

        $("#showContactForm").on('click',function(){
        $("#contactFormWrapper").slideToggle();
        $('html, body').animate({
            scrollTop: $("#showContactForm").offset().top
        }, 2000);
        });
    });
</script>
