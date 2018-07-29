<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'player-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    'htmlOptions' => array('class'=>'well','enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->error($model,'common_error'); ?>
	
    <?php 
    echo $form->dropDownListRow($model, 'team_id', CHtml::listData(Team::model()->findAll(array('order'=>'Name ASC')), 'team_id', 'name'),array('empty'=>'Select Team','class'=>''));
    ?>
    
    <?php echo $form->textFieldRow($model,'first_name',array('class'=>'')); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'')); ?>

    <div class="control-group ">
        <div class="controls">
            <?php if (!empty($model->image)){?>
                <img src="<?php echo Yii::app()->request->baseUrl."/themes/images/player_images/".$model->image ?>" alt="logo" style="width: 50px;"/>
            <?php }?>
        </div>
    </div>

	<?php echo $form->fileFieldRow($model,'image',array('class'=>'')); ?>

	<?php echo $form->textFieldRow($model,'jersey_number',array('class'=>'')); ?>
    
    <?php echo $form->textFieldRow($model,'country',array('class'=>'')); ?>

	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Create' : 'Update',
        )); ?>
    </div>

<?php $this->endWidget(); ?>
