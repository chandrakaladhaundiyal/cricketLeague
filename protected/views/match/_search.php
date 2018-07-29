<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'match_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tournament_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tounrnament_match_num',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'team1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'team2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'match_status',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'winner',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'score',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
