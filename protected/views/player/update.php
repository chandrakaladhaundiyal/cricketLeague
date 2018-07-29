<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->player_id=>array('view','id'=>$model->player_id),
	'Update',
);

?>

<h1 >Update Player</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>