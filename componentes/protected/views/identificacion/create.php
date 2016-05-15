<?php
/* @var $this IdentificacionController */
/* @var $model Identificacion */

$this->breadcrumbs=array(
	'Identificacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Identificaciones', 'url'=>array('index')),
	array('label'=>'Administrar Identificaciones', 'url'=>array('admin')),
        array('label'=>'Consultar Indentificaciones','url'=>array('consultar')),
);
?>

<h1>Crear Identificacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>