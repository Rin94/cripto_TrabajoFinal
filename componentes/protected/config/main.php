<?php
ob_start('My_OB');
#Yii::setPathOfAlias('bootstrap',  dirname(_FILE_).'/../extensions/bootstrap');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Criptología',
        'theme'=>'bootstrap',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.bootstrap-theme.widgets.*',
                'ext.bootstrap-theme.helpers.*',
                'ext.bootstrap-theme.behaviors.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
               # 'gii'=>array(
               #     'generatorPaths'=>array('bootstrap.gii'),
               # ),
            'gii' => array(
            
            'generatorPaths'=>array(
                'ext.bootstrap-theme.gii',
            ),
                ),
		
		//'gii'=>array(
                //		'class'=>'system.gii.GiiModule',
		//	'password'=>'oracle',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
		//	'ipFilters'=>array('127.0.0.1','::1'),
		//),
		
	),

	// application components
	'components'=>array(
            /*
               'urlManager'=>array(
			#'class'=>'application.components.UrlManager',
                        'urlFormat'=>'path',
                        'showScriptName'=> false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
             * 
             */
            
                'bootstrap'=>array(
                    'class'=>'bootstrap.components.Bootstrap',
                ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		 /*     
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info, profile, trace',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),				
			),
		),
                  * 
                  */

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'jerads.salinas94@gmail.com',
	),
);
