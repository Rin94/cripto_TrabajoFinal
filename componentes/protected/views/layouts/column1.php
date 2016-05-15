<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main');
echo Yii::app()->bootstrap->registerAllCss();
        echo Yii::app()->bootstrap->registerCoreScripts();?>

<div class="content" >
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>