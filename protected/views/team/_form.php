<?php
/* @var $this TeamController */
/* @var $model Team */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id' => 'team-form',
    'enableAjaxValidation' => false,
    'type'=>'horizontal',
    'htmlOptions' => array('class'=>'well','enctype' => 'multipart/form-data'),
)); ?>


<?php
 //print_r($model); exit;
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->error($model,'common_error'); ?>

    <?php echo $form->textFieldRow($model,'name',array('class'=>'','maxlength'=>200)); ?>

    <?php echo $form->textFieldRow($model,'club_state',array('class'=>'','maxlength'=>200)); ?>

    <div class="control-group ">
        <div class="controls">
            <?php if (!empty($model->logo)){?>
                <img src="<?php echo Yii::app()->request->baseUrl."/themes/images/".$model->logo ?>" alt="logo" style="width: 50px;"/>
            <?php }?>
        </div>
    </div>

    <?php echo $form->fileFieldRow($model,'logo',array('class'=>'')); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Create' : 'Update',
        )); ?>
    </div>

<?php $this->endWidget(); ?>
