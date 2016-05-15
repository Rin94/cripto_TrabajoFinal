<?php
/* @var $this IncidenciaController */
/* @var $model Incidencia */

$this->breadcrumbs = array(
    'Incidencias' => array('index'),
    'Consultar',
);

$this->menu = array(
    array('label' => 'Listar Identificaciones', 'url' => array('index')),
    array('label' => 'Crear Indentificacion', 'url' => array('create')),
    array('label'=>'Administrar Identificaciones','url'=>array('admin')),
    #array('label'=>'Consultar Indentificaciones','url'=>array('co')),
);
 

?>

<h1>Consultar Información</h1>


<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'consultar-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row" >
        <?php echo $form->labelEx($model, 'nick'); ?>
        <?php echo $form->textField($model, 'nick',  array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'nick'); ?>
    </div>
    


    <div class="row" >
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    


    <div class="row" >
        <?php echo $form->labelEx($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'id'); ?>
    </div>
    

    <div class="row buttons">
        <?php echo CHtml::submitButton('consultar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>

