<?php
$this->breadcrumbs=array(
	'Tbl Match Models'=>array('index'),
	$model->match_id,
);

$this->menu=array(
	array('label'=>'List TblMatchModel','url'=>array('index')),
	array('label'=>'Create TblMatchModel','url'=>array('create')),
	array('label'=>'Update TblMatchModel','url'=>array('update','id'=>$model->match_id)),
	array('label'=>'Delete TblMatchModel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->match_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblMatchModel','url'=>array('admin')),
);
?>

<h1>View TblMatchModel #<?php echo $model->match_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'match_id',
		'tournament_id',
		'tounrnament_match_num',
		'team1',
		'team2',
		'match_status',
		'winner',
		'score',
		'created_at',
		'updated_at',
	),
)); ?>
