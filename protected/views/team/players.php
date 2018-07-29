<?php
$teamName = CHtml::encode($teamName);
$id = CHtml::encode($id);
?>
<!-- Popup Header -->
<div class="modal-header">
    <h4><?php echo $teamName; ?></h4>
</div>
<!-- Popup Content -->
<div class="modal-body">
    <p>
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'type' => 'bordered',
            'dataProvider' => $model->search($id),
            'columns' => array(
                array('header' => 'Sr. No.',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'headerHtmlOptions' => array('class' => 'custom_header'),
                ),
                array(
                    'name' => 'image',
                    'type' => 'image',
                    'value' => 'Yii::app()->request->baseUrl."/themes/images/player_images/".$data->image', 'htmlOptions' => array('width' => '80px', 'height' => '80px'),
                ),
                array(
                    'header' => 'Player Name',
                    'value' => '$data->playerNameImage()',
                    'headerHtmlOptions' => array('class' => 'custom_header'),
                )
        )));
        ?>
    </p>
</div>

