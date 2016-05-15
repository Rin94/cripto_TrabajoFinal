<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Información del Programador</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<div class="profile">
    <b>Nombre:</b> Jared Daniel Salinas González
    <br/>
    <br/>
    <b>Materia:</b> Criptografía Y Algoritmos.
    <br/>
    <br/>
    <b>Grupo:</b> 8A.
    <br/>
    <br/>
    
    


</div>



<?php endif; ?>