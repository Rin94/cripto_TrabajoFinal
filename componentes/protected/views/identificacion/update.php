<?php
/* @var $this IdentificacionController */
/* @var $model Identificacion */

$this->breadcrumbs=array(
	'Identificacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Identificaciones', 'url'=>array('index')),
	array('label'=>'Crear Identificaciones', 'url'=>array('create')),
	array('label'=>'Ver Identificacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administar Identificaciones', 'url'=>array('admin')),
        array('label'=>'Consultar Indentificaciones','url'=>array('consultar')),
);
?>

<h1>Update Identificacion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>