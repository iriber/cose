<?php

namespace Cose\model;


/**
 * Interface gen�rica para una entity
 *  
 * @author bernardo
 *
 */
interface IEntity {

	/**
	 * @return the oid
	 */
	function getOid();

	/**
	 * @param oid the oid to set
	 */
	function setOid($oid);

	/**
	 * versi�n de la entity
	 * @return
	 */
	function getVersion();
	
	/**
	 * setea la versi�n de la entity.
	 * @param version
	 */
	function setVersion($version);	

}
