<?php
/*Assume that you have a folder named assets inside the protected folder used to store the images */

/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Manage',
);

?>

<h1>Teams</h1>

<?php echo CHtml::button('fixtures', array('submit' => array('fixtures'),'class' => 'btn btn-primary')); ?>

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
		array(
       'name'=>'logo', 
        'type'=>'image',
        'value'=>'Yii::app()->request->baseUrl."/themes/images/".$data->logo','htmlOptions'=>array('width'=>'5 0px','height'=>'50px'),
        'filter'=>false,
        ),
		'name',
		'club_state',
		array(
       		'header'=>'Total Match', 
        	'value'=>'Team::getTotalMatch($data->team_id)',
        	'headerHtmlOptions'=>array('class'=>'custom_header'),
        ),
        array(
            'header'=>'Won', 
            'value'=>'Team::getTotalWon($data->team_id)',
            'headerHtmlOptions'=>array('class'=>'custom_header'),
        ),
        array(
            'header'=>'Lost', 
            'value'=>'Team::getTotalLost($data->team_id)',
            'headerHtmlOptions'=>array('class'=>'custom_header'),
        ),
        array(
            'header'=>'Tie', 
            'value'=>'Team::getTotalTie($data->team_id)',
            'headerHtmlOptions'=>array('class'=>'custom_header'),
        ),
        array(
      	 	'header'=>'Score', 
        	'value'=>'Team::getTotalScore($data->team_id)',
        	'headerHtmlOptions'=>array('class'=>'custom_header'),
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
			'buttons'=>array
		    (		
		    	'view'=>
                    array(
                        'url'=>'Yii::app()->createUrl("team/players", array("id"=>$data->team_id))',
                        'options'=>array(
                            'ajax'=>array(
                                'async'=>true,
                                'type'=>'POST',
                                'url'=>"js:$(this).attr('href')",
                                'success'=>'function(data) { 
                                	$("#viewModal .model-head-body").html(data); 
                                	$("#viewModal").modal(); 
                                    $("#viewModal").on("hidden", function () {
                                        window.location.reload(true);
                                    })
                                }'
                            ),
                        ),
                    ),
    		),
		),
	),
)); ?>


<!-- View Popup  -->
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'viewModal')); ?>
<div class="model-head-body">
</div>
<!-- Popup Footer -->
<div class="modal-footer">

<!-- close button -->
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Close',
    'url'=>'#',
    'htmlOptions'=>array('data-dismiss'=>'modal'),
)); ?>
<!-- close button ends-->
</div>
<?php $this->endWidget(); ?>
<!-- View Popup ends -->
