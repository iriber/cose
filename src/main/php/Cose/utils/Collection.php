<?php

/**
 * Inteface para manejar una lista de objetos.
 * 
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 10/03/2010
 *
 */
namespace Cose\utils;


interface Collection extends \Iterator {

	function addItem($value, $index=null);

	function push($value);

	function removeItem($i);

	function removeItemByKey($key);

	function isEmpty();
	
	function existIndex($index);

	function existObject($object);

	function existObjectComparator($object, $comparator);

	function getObjectByIndex($index);

	function size();

	function order ( $field, $inverse = false, $case_sensitive = true);
	
	function addAll($items);
	
	function fill( $field, $value, $case_sensitive = true);
	
}
