<?php

/**
 * Excepci�n gen�rica para los DAOs.
 * 
 * @author bernardo
 * @since 14-03-2010
 */

namespace Cose\exception;

class DAOException extends \Exception{
	
	public function __construct($msg=null){
		if($msg==null)
			$msg = "Error en el DAO";
		
		parent::__construct($msg);
	}
	
}
