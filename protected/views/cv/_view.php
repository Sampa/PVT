<?php
/* @var $this CvController */
/* @var $data Cv */
?>
<div class="cvRow container">
    <section class="col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-2">
				<a href="<?php echo Yii::app()->baseUrl."/cv/pdf/".$data->id; ?>" title="Öppna pdf" class="thumbnail">
                    <img src="<?php echo Yii::app()->baseUrl;?>/img/CVicon.png" />
                </a>
            </div>
			<div class="col-xs-12 col-sm-12 col-md-3">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo substr(CHtml::encode($data->date),0,10); ?></span></li>
					<li><i class="glyphicon glyphicon-briefcase"></i> <span><?php echo CHtml::encode($data->typeOfEmployment); ?></span></li>
					<!-- En loop som Skriver ut regionerna -->
                    <?php
                        foreach($data->areas as $area){?>
                        <li>
                            <i class="glyphicon glyphicon-globe"></i>
                            <span><?= $area->country; ?>, </span>
                            <span><?= $area->region; ?>, </span>
                            <span><?= $area->city; ?></span>
                        </li>
                    <?php }?>
					<li>
                        <i class="glyphicon glyphicon-user"></i>
                        <span>
                            <?php echo CHtml::encode($data->publisher->username); ?>
                        </span>
                    </li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet" style="margin-top:-25px">
				<h3>
					<a href="<?php echo Yii::app()->baseUrl."/cv/pdf/".$data->id; ?>" title="öppna pdf">
						<?php echo ($data->title);?>
					</a>
				</h3>
                    <?php
                        foreach($data->keywords as $cvTag){
                            //frequency är hur ofta den använts
                            $number = $cvTag->frequency;
                            //skriver ut taggen så att mer använda taggar blir större
                            echo '<span class="label label-info" style="margin-right:10px;"> '.$cvTag->name.'</span>';
                        
                        }
                    ?>
                <br/>
                <span class="plus">
                    <a href="#" title='<?php echo t("Rapportera CV för olämpligt innehåll");?>'>
                        <i 
                            data-toggle="modal" 
                            data-target="#reportModal" 
                            id="<?php echo $data->id?>" 
                            data-user="<?php echo user()->isGuest ? 0:user()->id; ?>"
                            class="glyphicon glyphicon-flag report-cv-flag">
                            <?php echo Yii::t("t","Rapportera");?>
                        </i>
                    </a>
                </span>
                
                <?php if( Yii:: app()->user->getState("role")=="recruiter") { ?>
               <button class="btn btn-primary btn dropdown-toggle pull-right" type="button"data-toggle="dropdown">
                   <i class="glyphicon glyphicon-file"></i>
                   <?php echo Yii::t("t","Lägg till hotlist");?>
                   <span class="caret"></span>
               </button>
                <?php } ?>
                <ul class="dropdown-menu pull-right" id="<?php echo $data->id;?>">
                    <?php echo Recruiter::getProcessesAsList();?>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl("/recruitmentprocess/create");?>">
                            <?php echo Yii::t("t","Skapa ny process");?>
                        </a>
                    </li>
                </ul>
             </div>
			<span class="clearfix borda"></span>
		</article>
		<hr>
	</section>
</div>