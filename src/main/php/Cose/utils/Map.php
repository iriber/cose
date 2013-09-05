<?php

namespace Cose\utils;

class Map  {
	
	private $map;
	
	function __construct(array $arrayList = null) {
		if($arrayList != null){
			$this->map = $arrayList;
		}else{
			$this->map = array();
		}
	}
	
	/**
	 * Retorna un objeto del map
	 * @param unknown_type $index
	 * 
	 */
	public function get($index){
		if(isset($this->map[ $index ])){
			return $this->map[ $index ];
		}
		return null;
	}
	
	/**
	 * Agrega un item con su key al map
	 * @param $key
	 * @param $o
	 */
	public function put($key, $o){
		$this->map[$key] = $o;
	}

	/**
	 * Limpa a cole��o atual deixando-a sem nenhum elemento
	 * @return boolean
	 * @see Collection::isEmpty()
	 */
	public function clear(){
		$this->map = array();
	}


	public function keys() {
		return array_keys( $this->map );
	}
	
	public function values() {
		return array_values( $this->map );
	}
    
    
}

?>