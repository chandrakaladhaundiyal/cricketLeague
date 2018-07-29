<?php
$this->breadcrumbs=array(
	'Match'=>array('admin'),
	'Create',
);

?>

<h1>Create Match</h1>
<?php echo CHtml::button('Manage Match', array('submit' => array('admin'), 'class' => 'btn btn-primary')); ?>
</br>
<?php echo $this->renderPartial('_form', array('model'=>$model,'team2'=>'','winner'=>'',)); ?>