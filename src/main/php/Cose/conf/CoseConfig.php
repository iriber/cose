<?php

namespace Cose\conf;


class CoseConfig {
	
	
	/**
	 * singleton instance
	 * @var CoseConfig
	 */
	private static $instance;
	
	
	private function __construct(){
		 
	}
	
	public static function getInstance(){
		if (  !self::$instance instanceof self ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	
    
    /**
     * inicializamos el módulo de servicios
     */
    public function initialize( $appName="", $cdtHome="" ){
    	
 		/*   	
    	if (! defined ( 'APP_NAME' ))
			define ( 'APP_NAME', "/$appName/" );

		if (! defined ( 'APP_HOME' ))
			//define ( 'APP_PATH', $_SERVER ['DOCUMENT_ROOT'] . APP_NAME );
			define ( 'APP_HOME', getenv ('DOCUMENT_ROOT') . APP_NAME );

		if (! defined ( 'WEB_PATH' ))
			//define ( 'WEB_PATH', 'http://' . $_SERVER ['HTTP_HOST'] . APP_NAME );
			define ( 'WEB_PATH', 'http://' . getenv ('HTTP_HOST') . APP_NAME );

    	if (! defined ( 'CDT_HOME' ))
			define ( 'CDT_HOME', $cdtHome );
			*/			
    }
    

}