<?php
/* Assume that you have a folder named assets inside the protected folder used to store the images */

/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs = array(
    'Teams' => array('index'),
    'Manage',
);
?>

<h1>Teams</h1>

<?php echo CHtml::button('fixtures', array('submit' => array('fixtures'), 'class' => 'btn btn-primary')); ?>
&nbsp;&nbsp;&nbsp;
<?php echo CHtml::button('Add Team', array('submit' => array('create'), 'class' => 'btn btn-primary')); ?>



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


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'type' => 'striped bordered condensed hover',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('header' => 'Sr. No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
        array(
            'name' => 'logo',
            'type' => 'image',
            'value' => 'Yii::app()->request->baseUrl."/themes/images/".$data->logo', 'htmlOptions' => array('width' => '5 0px', 'height' => '50px'),
            'filter' => false,
        ),
        'name',
        'club_state',
        array(
            'header' => 'Total Match',
            'value' => 'Team::getTotalMatch($data->team_id)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
        array(
            'header' => 'Won',
            'value' => 'Team::getTotalWon($data->team_id)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
        array(
            'header' => 'Lost',
            'value' => 'Team::getTotalLost($data->team_id)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
        array(
            'header' => 'Tie',
            'value' => 'Team::getTotalTie($data->team_id)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
        array(
            'header' => 'Score',
            'value' => 'Team::getTotalScore($data->team_id)',
            'headerHtmlOptions' => array('class' => 'custom_header'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html(data); }',
            'template' => '{view}{update}{delete}',
            'buttons' => array
                (
                'view' =>
                array(
                    'url' => 'Yii::app()->createUrl("team/players", array("id"=>$data->team_id))',
                    'options' => array(
                    'title'=>'View Player List',
                        'ajax' => array(
                            'async' => true,
                            'type' => 'POST',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'function(data) { 
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
));
?>


<!-- View Popup  -->
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'viewModal')); ?>
<div class="model-head-body">
</div>
<!-- Popup Footer -->
<div class="modal-footer">

    <!-- close button -->
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <!-- close button ends-->
</div>
<?php $this->endWidget(); ?>
<!-- View Popup ends -->
