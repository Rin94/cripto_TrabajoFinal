<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

        <?php 
        echo Yii::app()->bootstrap->registerAllCss();
        echo Yii::app()->bootstrap->registerCoreScripts();
        ?>
        

	<title><?php echo CHtml::encode("Criptografía"); ?></title>
</head>

<body style="background:#EEF5F1">
	<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn-navbar" data-toogle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>
                    
                    <a class="brand "href="<?php echo Yii::app()->homeUrl; ?>">
                        <?php  echo Yii::app()->name;?>
                    </a>
                    <div class="nav-collapse collapse">
		<?php if (Yii::app()->user->name == "Guest") {
                    $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
                                #array('label'=>'Identificacion', 'url'=>array('/identificacion/index'),
                                  #  'items' => array(
                                   
                                    array('label' => 'Listar', 'url' => array('/identificacion/index')),
                           
                                #),'itemOptions'=>array('class'=>'dropdown')),               
				array('label'=>'Contacto', 'url'=>array('/site/contact')),                      
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
                    'htmlOptions'=>array('class'=>'nav navbar-nav'),
                    'submenuHtmlOptions'=>array('class'=>'nav navbar-nav')
		)); 
                    
                }
                else{
                
                
                $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
                                #array('label'=>'Identificacion', 'url'=>array('/identificacion/index'),
                                  #  'items' => array(
                                    array('label' => 'Registrar', 'url' => array('/identificacion/create')),
                                    array('label' => 'Listar', 'url' => array('/identificacion/index')),
                                    array('label' => 'Administrar', 'url' => array('/identificacion/admin')),
                                    array('label' => 'Consultar', 'url' => array('/identificacion/consultar')),
                                #),'itemOptions'=>array('class'=>'dropdown')),               
				array('label'=>'Contacto', 'url'=>array('/site/contact')),                      
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
                    'htmlOptions'=>array('class'=>'nav navbar-nav'),
                    'submenuHtmlOptions'=>array('class'=>'nav navbar-nav')
		));
                }
                ?>
                        </div>
                </div>
            </div>
	</div><!-- mainmenu -->
        <div class="container">
            <div class="page-header">
                <br/><br/>
                
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                  </div>
            
        
            <div class="page">
	<?php echo $content;
        
        
        ?>
            
            
      </div>
            
            
            

	

	<div class="footer text-center">
		Copyright &copy; <?php echo date('Y'); ?> Jared Daniel Salinas González.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

        </div>

</body>
</html>
