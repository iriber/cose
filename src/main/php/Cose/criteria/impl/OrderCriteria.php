<?php
namespace Cose\criteria\impl;

use Cose\criteria\ICriteria;

/**
 * Representa un orden para el criteria.
 * 
 * @author bernardo
 *
 */
class OrderCriteria{

	/**
	 * nombre del order
	 * @var string
	 */
	private $name;
	
	/**
	 * ordenar ascendentemente
	 * @var boolean
	 */
	private $asc;
	
	public function __construct($name, $asc=false){
		
		$this->setName($name);
		$this->setAsc($asc);
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getAsc()
	{
	    return $this->asc;
	}

	public function setAsc($asc)
	{
	    $this->asc = $asc;
	}
}
