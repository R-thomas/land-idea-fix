<?php
/* @var $this FieldsController */
/* @var $model Fields */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fields-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row other-fields">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row advantages">
        <?php echo $form->labelEx($model,'advantages'); ?>
        <?php echo CHtml::textField('advantagesText[]', null, array('class'=>'form-control advantagesText')); ?>
        <?php echo CHtml::fileField('advantagesImg[]', null, array('class'=>'advantagesImg')); ?>
        <?php echo CHtml::submitButton('Добавить преимущество', array('class'=>'btn btn-success button-advantages')); ?>

	</div>

	<div class="row other-fields scheme">
		<?php echo $form->labelEx($model,'scheme'); ?>
        <?php echo CHtml::textField('schemeText[]', null, array('class'=>'form-control schemeText')); ?>
        <?php echo CHtml::fileField('schemeImg[]', null, array('class'=>'schemeImg')); ?>
        <?php echo CHtml::submitButton('Добавить этап', array('class'=>'btn btn-success button-scheme')); ?>
	</div>

	<div class="row other-fields clients">
		<?php echo $form->labelEx($model,'clients'); ?>
        <?php echo CHtml::fileField('clientsImg[]', null, array('class'=>'clientsImg')); ?>
        <?php echo CHtml::submitButton('Добавить клиента', array('class'=>'btn btn-success button-clients')); ?>
	</div>

	<div class="row other-fields feedback">
		<?php echo $form->labelEx($model,'feedback'); ?>
        <label for="feedbackDescriptionText">Описание задачи</label>
        <?php echo CHtml::textField('feedbackDescriptionText[]', null, array('class'=>'form-control feedbackDescriptionText')); ?>
        <label for="feedbackResultImg">Фото результата</label>
        <?php echo CHtml::fileField('feedbackResultImg[]', null, array('class'=>'feedbackResultImg')); ?>
        <label for="feedbackText">Текст отзыва</label>
        <?php echo CHtml::textField('feedbackText[]', null, array('class'=>'form-control feedbackText')); ?>
        <label for="feedbackScreenImg">Скриншот отзыва</label>
        <?php echo CHtml::fileField('feedbackScreenImg[]', null, array('class'=>'feedbackScreenImg')); ?>
		<?php echo $form->error($model,'feedback'); ?>
        <?php echo CHtml::submitButton('Добавить отзыв', array('class'=>'btn btn-success button-feedback')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script src="/js/admin-add-fields.js"></script>
<?php if(isset($_GET['id'])): ?>
<?php echo "<script>"; ?>
<?php echo "var model = {};"; ?>
<?php echo "model.id = ". $model->id . ";"; ?>
<?php echo "model.title = '". $model->title . "';"; ?>
<?php echo "model.advantages = ". $model->advantages . ";"; ?>
<?php echo "model.scheme = ". $model->scheme . ";"; ?>
<?php echo "model.clients = ". $model->clients . ";"; ?>
<?php echo "model.feedback = ". $model->feedback . ";"; ?>
<?php echo "</script>"; ?>

<script src="/js/admin-update-fields.js"></script>

<?php endif; ?>

<style>
    .advantages, .other-fields{
        padding: 15px;
        border: 3px solid #cccccc;
        border-radius: 10px;
    }
    input, label, .button-advantages, .button-scheme, .button-clients, .button-feedback{
        display: block;
    }
    .advantagesImgFile, .schemeImgFile, .clientsImgFile{
        width: 100px;
    }

    .advantagesFileClose, .schemeFileClose, .clientsFileClose, .feedbackResultImgFileClose, .feedbackScreenImgFileClose{
        display: inline-block;
        vertical-align: top;
        color: #0e509e;
        cursor: pointer;
    }
    hr {
        height: 3px;
        background-color: #777;
        margin-top: 10px;
    }
</style>