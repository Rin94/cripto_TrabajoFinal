<?php
$this->breadcrumbs = array(
    'Identifications'=>array('index'),
    'Consultar' => array('consultar'),
   // $model->id,
);

$this->menu = array(
    array('label' => 'Listar Identificaciones', 'url' => array('index')),
    array('label' => 'Crear Identificaciones', 'url' => array('create')),
    array('label' => 'Consultar Identificaciones', 'url' => array('consultar')),
        #array('label'=>'Actualizar/Modificar Incidencia', 'url'=>array('update', 'id'=>$model->id)),
        #array('label'=>'Borrar Incidencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
        #array('label'=>'Gestionar Incidencia', 'url'=>array('admin')),
);
?>



<?php echo " <h1>Datos Descifrados</h1>"; ?>


<?php
$darSeguimiento = 0;
$modelID;
//$arreglo = $model->descifrarAes(IdentificacionController::$name,IdentificacionController::$pass);
 //echo '<pre>';
 
$name=$_POST['Identificacion']['nick'];
$pass=$_POST['Identificacion']['password'];
$id=$_POST['Identificacion']['id'];
$arreglo = $model->descifrarAes($name,$pass);
$etiquetas=array('Nick','Password','Nombre','aP. Pat','aP. Mat','Calle','Colonia','Municipio','Estado','Pais','Telefono','Tarjeta','ID');
$i=0;
foreach($arreglo as $row) {
   // print_r($row);
    
    foreach($row as $a) {
        echo CHtml::label($etiquetas[$i],$etiquetas[$i],array()).": ";
        echo CHtml::textField($a,$a,array())."</br>";
        $i++;
        
 
 }
    
 }
 echo CHtml::label($etiquetas[$i],$etiquetas[$i],array()).": ";
 echo CHtml::textField($id,$id,array())."</br>";


?>

