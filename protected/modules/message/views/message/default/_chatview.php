<div style="display:block;" id="chatDiv">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat med <?php echo $receiverName;?>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                        Away</a></li>
                                <li class="divider"></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                        Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="chat">
                            <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                        dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                        <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                        dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li>|
                        </ul>
                    </div>
                    <div class="panel-footer" style="min-height: 70px;">
                            <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'message-form',
                                'enableAjaxValidation'=>true,
                                'enableClientValidation'=>true,
                                'clientOptions'=>array(
                                    'validateOnType'=>true,
                                    'validateOnSubmit' => true,
                                    'errorCssClass' => 'has-error',
                                    'successCssClass' => 'has-success',
                                    'inputContainer' => '.control-group',
                                    'validateOnChange' => true
                                ),
                            )); ?>
                            <?php echo $form->hiddenField($model,'receiver_id',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>
                            <div class="col-md-11 col-lg-11 col-sm-8 row">
                                <span class="input-group input-group-btn">
                                        <?php echo $form->textField($model,'body',array(
                                            'class'=>'form-control',
                                            'placeholder'=>t("Skriv ditt meddelande här...")
                                        )); ?>
                                        <?php echo CHtml::submitButton(t("Skicka"),array(
                                            "id"=>"btn-chat",
                                            "class"=>"btn-warning btn")); ?>
                                </span>
                            </div>
                            <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
