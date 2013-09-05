<?php
namespace Cose\criteria\impl;

use Cose\criteria\ICriteria;

/**
 * Representa un criterio de b�squeda.
 * 
 * @author bernardo
 *
 */
class Criteria implements ICriteria{

	/**
	 * offset para la paginación.
	 * @var int
	 */
	private $offset;
	
	/**
	 * cantidad de elementos para la paginación.
	 * @var int
	 */
	private $maxResult;

	private $orders;
	
	public function __construct(){
		$this->orders = array();
	}
	
	public function addOrder($name, $type="DESC"){
	
		$this->orders[] = array("name" => $name, "type" => $type);			
	}
	
	public function getOffset()
	{
	    return $this->offset;
	}

	public function setOffset($offset)
	{
	    $this->offset = $offset;
	}

	public function getMaxResult()
	{
	    return $this->maxResult;
	}

	public function setMaxResult($maxResult)
	{
	    $this->maxResult = $maxResult;
	}
	

	public function getOrders()
	{
	    return $this->orders;
	}

	public function setOrders($orders)
	{
	    $this->orders = $orders;
	}
	
	
}
