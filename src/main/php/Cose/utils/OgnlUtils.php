<?php

namespace Cose\utils;


/**
 * M�todos para trabajar con ognl.
 *
 * @author Bernardo
 */
class OgnlUtils {
  
	/**
	 * Retorna el valor dada la expresi�n ognl
	 * @param unknown_type $expression
	 * @param unknown_type $object
	 */
	public static function getValue($expression, $object) {
  	
		$value = ReflectionUtils::doGetter($object, $expression);
	    return $value;
  	}

  	/**
  	 * Setea el valor dada la expresi�n ognl
  	 * @param unknown_type $expression
  	 * @param unknown_type $object
  	 * @param unknown_type $value
  	 */
	public static function setValue($expression, $object, $value) {
  	
	    ReflectionUtils::doSetter($object, $expression, $value);
	    
  	}
}

