<?php
/*Assume that you have a folder named assets inside the protected folder used to store the images */

/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Manage',
);

?>

<h1>Match Fixtures</h1>

<?php echo CHtml::button('Teams List', array('submit' => array('index'),'class' => 'btn btn-primary')); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'type'=>'striped bordered condensed hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('header'=>'Sr. No.',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'headerHtmlOptions'=>array('class'=>'custom_header'),
        ),
        'match_date',
        array(
            'name'=>'team1',
            'value'=>'$data->team_first->name',
            'filter' => CHtml::listData(Team::model()->findAll(),'team_id','name')
        ),
        array(
            'name'=>'team2',
            'value'=>'$data->team_second->name',
            'filter' => CHtml::listData(Team::model()->findAll(),'team_id','name')
        ),
        array(
            'header'=>'Winner', 
            'value'=>'($data->winner != NULL) ? $data->winnerTeam->name : "Tie"',
            'headerHtmlOptions'=>array('class'=>'custom_header'),
        ),
        array(
            'name'=>'score',
            'header'=>'Winner Score',
            'value'=>'$data->score',
        ),
	),
)); ?>