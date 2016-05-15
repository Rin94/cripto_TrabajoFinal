<?php
/* @var $this IdentificacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Identificacions',
);

$this->menu=array(
	array('label'=>'Crear Identificaciones', 'url'=>array('create')),
	array('label'=>'Administar Identificaciones', 'url'=>array('admin')),
    array('label'=>'Consultar Indentificaciones','url'=>array('consultar'))
);
?>

<h1>Identificaciones</h1>

<?php $this->widget('zii.widgets.CListView',
        array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'htmlOptions'=>array('class'=>'list-view','font'=>'10'),
)); ?>
