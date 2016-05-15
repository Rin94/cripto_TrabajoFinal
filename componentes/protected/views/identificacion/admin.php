<?php
/* @var $this IdentificacionController */
/* @var $model Identificacion */

$this->breadcrumbs=array(
	'Identificacions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Identificacion', 'url'=>array('index')),
	array('label'=>'Create Identificacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#identificacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Identificaciones</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'identificacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nick',
		'password',
		'nombre',
		'apellido_pat',
		'apellido_mat',
		'calle_numero',
		/*
		'colonia',
		'municipio',
		'estado',
		'pais',
		'telefono',
		'tarjeta_credito',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
