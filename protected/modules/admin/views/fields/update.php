<?php
/* @var $this FieldsController */
/* @var $model Fields */

$this->breadcrumbs=array(
	'Fields'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fields', 'url'=>array('index')),
	array('label'=>'Create Fields', 'url'=>array('create')),
	array('label'=>'View Fields', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Fields', 'url'=>array('admin')),
);
?>

<h1>Update Fields <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>