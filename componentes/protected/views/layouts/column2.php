<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main');
echo Yii::app()->bootstrap->registerAllCss();
        echo Yii::app()->bootstrap->registerCoreScripts();
?>
<div class="span-19">
	<div class="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 ">
	<div class="nav-collapse collapse">
	<?php
	#	$this->beginWidget('zii.widgets.CPortlet', array(
	#		'title'=>'Operaciones',
		#));
		#$this->widget('zii.widgets.CMenu', array(
		#	'items'=>$this->menu,
		#	'htmlOptions'=>array('class'=>'nav navbar-nav'),
		#));
		#$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>