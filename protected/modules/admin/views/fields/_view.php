<?php
/* @var $this FieldsController */
/* @var $data Fields */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advantages')); ?>:</b>
	<?php echo CHtml::encode($data->advantages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scheme')); ?>:</b>
	<?php echo CHtml::encode($data->scheme); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clients')); ?>:</b>
	<?php echo CHtml::encode($data->clients); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback')); ?>:</b>
	<?php echo CHtml::encode($data->feedback); ?>
	<br />


</div>