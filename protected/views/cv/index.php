<?php
/* @var $this CvController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
	Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
	Yii::t("t",'Sök'),
);
?>
<?php if (Yii::app()->user->hasFlash('index')): ?>
	<div class="alert alert-info  alert-dismissable">
		<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
		<strong><?php echo Yii::app()->user->getFlash('index'); ?></strong>
	</div>
<?php else: ?>
<!--<div class="page-header">-->
<!--	<h1>--><?php //echo Yii::t("t", "Hitta CV");?><!-- </h1>-->
<!--</div>-->
<div class="form">
	<form class="form " role="search" name="search" method="post" >
		<div class="form-group ">
			<label for="searchbox"><?php echo Yii::t("t","Fritext och meta taggar");?></label>
			<div class="input-group">
				<input type="text" name="searchbox" class="form-control" placeholder="<?php echo Yii::t("t","Fritextsökning...");?>"/>
				<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
			</div
		</div>
		<div class="row" style="margin-left:2px;margin-top:0px;margin-bottom: 15px; max-width: 50%;">
			<label for="searchbox"><?php echo Yii::t("t","Nyckelord");?></label>
			<input type="text" id="taggar" name="tags" class="form-control" placeholder="<?php echo Yii::t("t","Nyckelord att söka på...");?>" />
		</div>
		<div>
			<?php $this->renderPartial('_allCountriesSelect', array('')); ?>
		</div>
		<div class="checkbox">
			<input name="consult" type="checkbox"/> <?php echo Yii::t("t","Sök efter konsultuppdrag");?><br>
			<input name="employment" type="checkbox"/> <?php echo Yii::t("t","Sök efter tillsvidareanställning");?>
		</div>
		<div style="margin-top:15px;">
			<button type="submit" class="btn btn-primary"><?php echo Yii::t("t","Sök");?></button>
		</div>
	</form>
	<hr/>
	<h3> <?php echo Yii::t('t', 'Sortera på:');?> </h3>
	<div class="btn-group">
		<button id="title" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Rubrik');?></button>
		<button id="date" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Datum');?></button>
		<button id="typeOfEmployment" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Anställningsform');?></button>
		<!--- <button id="geograficArea" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Geografisk area');?></button>-->
	</div>
	<div class="well" style="display:none;" id="sortSelectionWrapper"><h4><?php echo Yii::t("t","Sorterade listan efter ");?><span id="sortSelection"></span></h4></div>
	<hr>
	<?php
	if($resultCount< 1):?>
		<div class="alert alert-info"><?php echo Yii::t("t","Inga sökresultat hittades så vi visar alla");?></div>
	<?php endif;?>
	<div id="listOfCvs">
		<?php
		$this->widget('bootstrap.widgets.TbListView',array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));
		?>
	</div><!-- form -->
	<?php endif;?>
	<script>
		$(function(){
			var tags = <?php echo json_encode(Tag::getTagsAsString());?>;
			$("#taggar").select2({
				tags:tags
			});
			/*
			 * När man klickar på en sorteringsknapp
			 */
			$(".sortButton").on("click",function(){
				var post = <?php echo json_encode($_POST);?>; //ta nuvarande sökningsresultats data
				post.sortBy = $(this).attr("id"); //ändra sortBy värdet till det i id attributet på knappen man tryckt på
				$.ajax({  //gör en http POST request till vår actionIndex i CvController och skicka med datan
					type: "POST",
					url: "cv/",
					data: post
				}).done(function( data ) { //när vår request är done så  ta hand om det vi får tillbaka, spara det i variabeln data
					$("#listOfCvs").html(data); //byt ut html innehållet i vår lista
					$("#sortSelectionWrapper").fadeIn('slow'); //visa feedback på att vi sorterat
					var displayText ="anställningsform";
					switch(post.sortBy){ //sätt rätt meddelande beroende på sortering
						case "date":
							displayText ="datum";
							break;
						case "title":
							displayText = "rubrik";
					}
					$("#sortSelection").html(displayText);
				});
			});
		});
	</script>





