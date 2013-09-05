<?php

namespace Cose\exception;


/**
 * Excepción para indicar que una entity se duplica
 * 
 * @author bernardo
 * @since 21-08-2013
 */

class DuplicatedEntityException extends ServiceException{
	
	private $oid;
	
	public function __construct($msg="entity.duplicated"){

		parent::__construct($msg);
		
	}
	

	public function getOid()
	{
	    return $this->oid;
	}

	public function setOid($oid)
	{
	    $this->oid = $oid;
	}
}
