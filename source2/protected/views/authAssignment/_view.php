<?php
/* @var $this AuthAssignmentController */
/* @var $data AuthAssignment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('itemname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->itemname), array('view', 'id'=>$data->itemname)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bizrule')); ?>:</b>
	<?php echo CHtml::encode($data->bizrule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />


</div>