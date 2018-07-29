<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('match_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->match_id),array('view','id'=>$data->match_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tournament_id')); ?>:</b>
	<?php echo CHtml::encode($data->tournament_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tounrnament_match_num')); ?>:</b>
	<?php echo CHtml::encode($data->tounrnament_match_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team1')); ?>:</b>
	<?php echo CHtml::encode($data->team1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team2')); ?>:</b>
	<?php echo CHtml::encode($data->team2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('match_status')); ?>:</b>
	<?php echo CHtml::encode($data->match_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winner')); ?>:</b>
	<?php echo CHtml::encode($data->winner); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>