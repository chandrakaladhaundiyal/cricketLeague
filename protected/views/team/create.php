<?php
/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Create',
);


?>.

<h1>Create Team</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>