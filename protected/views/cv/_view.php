<?php
/* @var $this CvController */
/* @var $data Cv */
?>

<!-- <div class="view">

	<table class="table table-hover">
		<tr>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
				<?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id)); ?>
		 	</td>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:
				<?php echo CHtml::encode($data->date); ?>
		 	</td>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('pathToPdf')); ?>:
   				<a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->pathToPdf); ?>" rel="pdf"><?php echo Yii::t("t","Öppna cv");?></a>
		 	</td>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('typeOfEmployment')); ?>:
				<?php echo CHtml::encode($data->typeOfEmployment); ?>
		 	</td>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('geographicAreaId')); ?>:
				<?php echo CHtml::encode($data->geographicAreaId); ?>
		 	</td>
		</tr>
	</table> -->

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pdfText')); ?>:</b>
	<?php echo CHtml::encode($data->pdfText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisherId')); ?>:</b>
	<?php echo CHtml::encode($data->publisherId); ?>
	<br />

	*/ ?>
<div class="container">



    <section class="col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->pathToPdf); ?>" title="Lorem ipsum" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/CVicon.png" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo substr(CHtml::encode($data->date),0,10); ?></span></li>
					<li><i class="glyphicon glyphicon-briefcase"></i> <span><?php echo CHtml::encode($data->typeOfEmployment); ?></span></li>
					<?php
					//DB Query to get the country name.
                    if(isset($data->geographicArea->country)){
                        $countryName = $data->geographicArea->country;
                    }else
                       $countryName = null;
    				?>
					<li><i class="glyphicon glyphicon-globe"></i> <span><?= $countryName; ?></span></li>
					<li><i class="glyphicon glyphicon-user"></i> <span><?php echo CHtml::encode($data->publisher->username); ?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet" style="margin-top:-25px">
				<h3><a href="#" title=""><?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id)); ?></a></h3>
<!--                    <h3>Nyckelord:</h3>-->
                    <?php
                            foreach($data->cvTags as $cvTag){
                                //frequency är hur ofta den använts
                                $number = $cvTag->tag->frequency+20;
                                //skriver ut taggen så att mer använda taggar blir större
                                echo '<span style="font-size:'.$number.'px"> '.$cvTag->tag->name.'</span>';
                            }
//                    ?>
                <br/>
                <span class="plus"><a href="#" title="Lorem ipsum"><i id="report-cv-flag" class="glyphicon glyphicon-flag"></i></a></span><span></span><?php echo Yii::t("t"," Rapportera");?></span>
<!--                <button type="button" class="btn btn-primary pull-right">Lägg til hotlist</button>-->
                <!-- Button trigger modal -->
                <?php if( Yii:: app()->user->getState("role")=="recruiter") { ?>
                <button class="btn btn-primary btn dropdown-toggle pull-right" type="button"data-toggle="dropdown">
                   <?php echo Yii::t("t","Lägg till hotlist");?> <span class="caret"></span>
                </button>
                <?php } ?>
                <ul class="dropdown-menu pull-right">
                    <?php echo Recruiter::getProcessesAsList();?>
                    <li class="divider"></li>
                    <li><a href="<?php echo Yii::app()->createUrl("/recruitmentprocess/create");?>"><?php echo Yii::t("t","Skapa ny process");?></a></li>
                </ul>
             </div>
                

                <!-- Modal -->
                <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Lägg till hotlist</h4>
                            </div>
                            <div class="modal-body">
                               <h5>Här kan du lägga till detta cv i en hotlist. Varje rekryteringsprocess har en egen hotlist. Välj en befintlig hotlist eller skapa en ny process.</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Ny rekryteringsprocess</button>
                            </div>
                        </div>
                    </div>
                </div>


			</div> -->
			<span class="clearfix borda"></span>
		</article>
		<hr>


	</section>
</div>

