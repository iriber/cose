<?php

namespace Cose\model\impl;

use Cose\model\IEntity;

//use DoctrineExtensions\Versionable\Versionable;

/**
 * entity genérica
 *  
 * @author bernardo
 * 
 * @MappedSuperclass 
 */
abstract class Entity implements IEntity{//, Versionable {

	/** @Id @Column(type="integer") @GeneratedValue **/
	private $oid;
	
	/*
	 * @Column(type="integer")
	 *  
	 **/
	private $version;
	

	

	/*
	public function equals($obj) {
		if (obj == null) {
			return false;
		}

		if (!$obj->getClass()->equals($this->getClass()))
			return false;

		$ok = $this->getOid() == $obj->getOid();
		return ok;
		
	}*/

	/**
	 * @return the oid
	 */
	public function getOid() {
		return $this->oid;
	}

	/**
	 * @param oid the oid to set
	 */
	public function setOid($oid) {
		$this->oid = $oid;
	}

	/**
	 * @return the version
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 * @param version the version to set
	 */
	public function setVersion($version) {
		$this->version = $version;
	}
	
	public function __toString(){
		return $this->getOid() . " - v" . $this->getVersion();
	}
}
