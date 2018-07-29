<?php
$this->breadcrumbs=array(
	'Tbl Match Models',
);

$this->menu=array(
	array('label'=>'Create TblMatchModel','url'=>array('create')),
	array('label'=>'Manage TblMatchModel','url'=>array('admin')),
);
?>

<h1>Tbl Match Models</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
