<?php
$this->breadcrumbs=array(
	'Tbl Match Models'=>array('index'),
	'Manage',
);


?>

<h1>Manage Match</h1>
<?php echo CHtml::button('Add Match', array('submit' => array('create'), 'class' => 'btn btn-primary')); ?>

<div id="statusMsg">
    <?php if(Yii::app()->user->hasFlash('success')) {?>
    </br>
        <div class="info" style="color:green">
            <label><?php echo Yii::app()->user->getFlash('success'); ?></label>
        </div>
    <?php } ?>
    <?php if(Yii::app()->user->hasFlash('error')) {?>
    </br>
        <div class="info" style="color:red">
            <label><?php echo Yii::app()->user->getFlash('error'); ?></label>
        </div>
    <?php } ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'match-grid',
        'type' => 'striped bordered condensed hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('header' => 'Sr. No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
		array(
            'name' => 'team1',
            'value' => '$data->team_first->name',
            'filter' => CHtml::listData(Team::model()->findAll(array('order'=>'name ASC')), 'team_id', 'name')
        ),
		array(
            'name' => 'team2',
            'value' => '$data->team_second->name',
            'filter' => CHtml::listData(Team::model()->findAll(array('order'=>'name ASC')), 'team_id', 'name')
        ),
		array(
            'name' => 'winner',
            'value' => 'isset($data->winnerTeam->name)?$data->winnerTeam->name:""',
            'filter' => CHtml::listData(Team::model()->findAll(array('order'=>'name ASC')), 'team_id', 'name')
        ),
		array(
                    'name' => 'match_status',
                    'value' => 'Match::getMatchStatus($data->match_status)',
                    'filter' => CHtml::listData(array(array('id'=>'0','name'=>'Tie'),array('id'=>'1','name'=>'Completed')), 'id', 'name')
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html(data); }',
			'template' => '{update}{delete}',
		),
	),
)); ?>
