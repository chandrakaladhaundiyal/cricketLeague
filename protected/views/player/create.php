<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=array(
	'Players'=>array('index'),
	'Create',
);
?>

<h1 >Create Player</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>