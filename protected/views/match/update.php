<?php
$this->breadcrumbs=array(
	'Match'=>array('admin'),
	$model->match_id=>array('view','id'=>$model->match_id),
	'Update',
);
?>
<h1>Update Match</h1>

<?php echo CHtml::button('Manage Match', array('submit' => array('admin'), 'class' => 'btn btn-primary')); ?>
&nbsp;&nbsp;&nbsp;
<?php echo CHtml::button('Add Match', array('submit' => array('create'), 'class' => 'btn btn-primary')); ?>
</br>
<?php echo $this->renderPartial('_form',array('model'=>$model,'team2'=>$team2, 'winner'=>$winner)); ?>