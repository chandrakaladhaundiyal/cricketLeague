<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=array(
	'Players'=>array('index'),
	'Manage',
);

?>

<h1>Manage Players</h1>
<?php echo CHtml::button('Add Player', array('submit' => array('create'), 'class' => 'btn btn-primary')); ?>
&nbsp;&nbsp;&nbsp;

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

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'player-grid',
        'type' => 'striped bordered condensed hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array('header' => 'Sr. No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
		array(
                    'name' => 'image',
                    'type' => 'image',
                    'filter'=>false,
                    'value' => 'Yii::app()->request->baseUrl."/themes/images/player_images/".$data->image', 'htmlOptions' => array('width' => '50px', 'height' => '50px'),
                ),
		array(
                    'name' => 'first_name',
                    'value' => '$data->playerNameImage()',
                    'headerHtmlOptions' => array('class' => 'custom_header'),
                ),
                array(
                    'name' => 'team_id',
                    'value' => '$data->team->name',
                    'filter' => CHtml::listData(Team::model()->findAll(), 'team_id', 'name')
                ),
		'jersey_number',
		'country',
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
            'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html(data); }',
            'template' => '{update}{delete}',
		),
	),
)); ?>
