<?php
/* @var $this IdentificacionController */
/* @var $model Identificacion */

$this->breadcrumbs=array(
	'Identificacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Identificaciones', 'url'=>array('index')),
	array('label'=>'Crear Identificaciones', 'url'=>array('create')),
	array('label'=>'Actualizar Identificacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Identificacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administar Identificaciones', 'url'=>array('admin')),
        array('label'=>'Consultar Indentificaciones','url'=>array('consultar'))
);
?>

<h1>Ver Identificacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nick',
		'password',
		'nombre',
		'apellido_pat',
		'apellido_mat',
		'calle_numero',
		'colonia',
		'municipio',
		'estado',
		'pais',
		'telefono',
		'tarjeta_credito',
		'id',
	),'htmlOptions'=>array('class'=>'detail-view')));


?>

