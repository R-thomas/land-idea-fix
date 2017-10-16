<?php

$this->menu=array(
	array('label'=>'Список полей', 'url'=>array('index')),
	array('label'=>'Менеджер полей', 'url'=>array('admin')),
);
?>

<h1>Create Fields</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>


