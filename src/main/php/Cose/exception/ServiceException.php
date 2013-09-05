<?php

/**
 * Excepci�n gen�rica para los servicios.
 * 
 * @author bernardo
 * @since 14-03-2010
 */

namespace Cose\exception;

class ServiceException extends \Exception{
	
	public function ServiceException($msg=null){
		if($msg==null)
			$msg = "Error en el servicio";
		
		parent::__construct($msg);
	}
	
}
