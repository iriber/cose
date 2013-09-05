<?php

namespace Cose\persistence;


use Cose\utils\Map;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;

/**
 * Contexto de persistencia para los servicios.
 * 
 * @author bernardo
 * @since 10/08/2012
 * 
 */
class PersistenceContext {
	
	/**
	 * map con los entity managers disponibles.
	 * @var Map
	 */
	private $em;
	
	/**
	 * instancia singleton
	 * @var PersistenceContext
	 */
	private static $instance;
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			/*
			if(!isset($_SESSION['persistenceContext'])){
				$_SESSION['persistenceContext'] = serialize ( new PersistenceContext() );
			}*/
			self::$instance = new PersistenceContext();
			
		}
		return self::$instance;
	}
	
	private function __construct() {
		$this->em = new Map();
	}
	
	/**
	 * 
	 * se obtiene el entity manager asociado a la unidad de 
	 * persistencia indicada. 
	 * si no se indica ninguna se toma la default.
	 * @param string $unitName nombre de la unidad de persistencia.
	 * @return Doctrine\ORM\EntityManager
	 */
	public function getEntityManager($unitName="") {
		
		if(empty($unitName))
			$unitName = PersistenceConfig::getDefaultUnit();
		
		
		if ($this->em->get($unitName) == null){
			$unit = PersistenceConfig::getUnits()->get($unitName);
			$em = EntityManager::create($unit->getConnectionOptions(), $unit->getConfig());
			$this->em->put($unitName, $em); 
		}else{
			if(!$this->em->get($unitName)->getConnection()->isConnected()){
				$this->em->get($unitName)->getConnection()->connect();
			}
		}
		
		return $this->em->get($unitName);	
	}
	
	/**
	 * se inicia una transacci�n en la unidad de persistencia indicada.
	 * si no se indica ninguna se toma la default.
	 * @param string $unitName nombre de la unidad de persistencia.
	 */
	public function beginTransaction($unitName=""){

		if(empty($unitName))
			$unitName = PersistenceConfig::getDefaultUnit();
			
		$entityManager =  self::getEntityManager( $unitName );
		
		$entityManager->getConnection()->beginTransaction();
	}
	
	/**
	 * se realiza el commit sobre  la unidad de persistencia indicada.
	 * si no se indica ninguna se toma la default.
	 * @param string $unitName nombre de la unidad de persistencia.
	 */
	public function commit($unitName=""){

		if(empty($unitName))
			$unitName = PersistenceConfig::getDefaultUnit();
			
		$entityManager =  self::getEntityManager( $unitName );
		
		$entityManager->getConnection()->commit();
	}

	/**
	 * se realiza el rolback sobre  la unidad de persistencia indicada.
	 * si no se indica ninguna se toma la default.
	 * @param string $unitName nombre de la unidad de persistencia.
	 */
	public function rollback($unitName=""){

		if(empty($unitName))
			$unitName = PersistenceConfig::getDefaultUnit();
			
		$entityManager =  self::getEntityManager( $unitName );
		
		$entityManager->getConnection()->rollback();
	}	
	
	/**
	 * se cierra la unidad de persistencia indicada.
	 * si no se indica ninguna se toma la default.
	 * @param string $unitName nombre de la unidad de persistencia.
	 */
	public function close($unitName=""){

		if(empty($unitName))
			$unitName = PersistenceConfig::getDefaultUnit();
			
		$entityManager =  self::getEntityManager( $unitName );
		
		$entityManager->getConnection()->close();
	}	
		

}

?>