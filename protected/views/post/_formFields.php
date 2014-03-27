<fieldset>
	
	<div class="row-fluid">
	<?=$form->errorSummary($model,Yii::t('skeleton','Error'), null,array('class'=>'alert alert-error')); ?>
	</div>


	<!-- TITLE -->
  
  	<div class="control-group">
		<?php 
			echo $form->labelEx($model,'title'); 
			echo "<br/>";
			echo $form->textField($model,'title',array('size'=>50,'maxlength'=>128)); 
			echo "<br/>";
			echo $form->error($model,'title');
		?>
	</div>

	<!-- CONTENT -->
	<div class="control-group">
		<?php
			//to prevent double menu hooking
			isset($modalUpdate)? $textAreaClass="modalUpdate": $textAreaClass = null;
			echo $form->labelEx($model,'content');
			echo "<br/>";
			echo $form->error($model,'content');
			echo CHtml::activeTextArea($model,'content',array('class'=>$textAreaClass,'rows'=>10,'cols'=>60, 'style'=>'')); 
			echo "<br/>";
		?>
	</div>

	<!-- TAGS -->
	<div id="tagsDiv" class="control-group">
		<?php
 	 		echo $form->labelEx($model,'tags',array()); 
			echo $form->textField($model,'tags',array('size'=>80,'maxlength'=>255,'style'=>'min-width:221px;')); 

			$tags = Tag::model()->suggestTags("",100);
				$this->widget('ext.select2.ESelect2',array(
				  'selector'=>'#Post_tags',
				  'options'=>array(
				    'tags'=>$tags,
				  ),
				  'htmlOptions'=>array(
				  	'name'=>'Post[tags]',
				  	'id'=>'Post_tags',
				  	'style'=>';'
				  )
				));
		?>
	</div>

	<!-- STATUS -->
	<div class="row-fluid control-group">
		<?php
			echo $form->labelEx($model,'status'); 
			echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); 
		
			$status_settings = array(
				'type'=> 'tooltip',
				'attribute' => "status", //requiered, the attribute of the form field 
				'top' => "-12em", //optional, relative positioning from below the form element
				'left' => "-17em", //optional,  relative positioning from below the form element
				'model'=>$model, //needed
				'form'=>$form, //only used if type != tooltip
				'width'=>'20em',
				'position'=>'top',
				'headerText' =>Yii::t('skeleton',"Required field"), //the title displayed for the user
				'content' =>  Yii::t('skeleton',"Published, will be visible for all <br/>  Draft, will be saved for later publishing  <br/> Archived, are no longer relevant"), 
			); 
			echo $form->error($model,'status');

		?>
	</div>
	<!-- hiddenfields for special data -->
	<?= $form->hiddenField($model,'id',array("value"=>isset($model->id)?$model->id:null)); ?>
	<?= $form->hiddenField($model,'fileFolder');?>
	<?= $form->hiddenField($model,'author_id');?>

	<!-- BUTTONS -->
	<div style=" margin-top:1em;">
	<!-- content of this element is displayed in the submitbutton while form is beeing submitted-->
	<span class="hide whileLoad"><i class="icon-spinner icon-spin"></i> </span>
	<?php 
		$this->widget('TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
            'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'htmlOptions'=>array('id'=>'submitPost', 'rel'=>$model->isNewRecord ? 'create' : 'update'),
		)); 
    	$this->widget('TbButton', array(
			'buttonType'=>'reset',
            'icon'=>'remove',  
			'label'=>'Reset',
		)); 
	?>
	</div>
</fieldset>

