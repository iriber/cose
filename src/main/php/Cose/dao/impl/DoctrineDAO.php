<?php
namespace Cose\dao\impl;

use Cose\utils\Logger;

use Cose\criteria\ICriteria;

use Cose\persistence\PersistenceContext;

use Cose\exception\DAOException,
	Cose\dao\IGenericDAO;

/**
 * Implementación del DAO genérico con doctrine
 *  
 * @author bernardo
 *
 */
abstract class DoctrineDAO implements IGenericDAO{

	/**
	 * entity manager
	 */
	protected $entityManager;

	public function __construct( $unitName=CDT_PERSISTENCE_DEFAULT_UNIT){
	
		//por default seteamos el entity manager sin indicar unidad de persistencia.
		$this->setEntityManager( PersistenceContext::getInstance()->getEntityManager($unitName) );
		
	}
	
	
	
	public function getEntityManager(){
	    return $this->entityManager;
	}

	public function setEntityManager($entityManager){
	    $this->entityManager = $entityManager;
	}
	

	/**
	 * retorna el nombre de la clase que administra.
	 */
	protected abstract function getClazz();
	
	/**
	 * helper para la construcci�n de queries.
	 * 
	 * @param ICriteria criteria
	 * @return
	 */
	protected abstract function getQueryBuilder(ICriteria $criteria);

	/**
	 * helper para la construcción de queries.
	 * 
	 * @param ICriteria criteria
	 * @return
	 */
	protected abstract function getQueryCountBuilder(ICriteria $criteria);
	
	/**
	 * arma un query dado un criterio de b�squeda.
	 * 
	 * @param ICriteria criteria
	 * @return
	 */
	protected function getQuery(ICriteria $criteria) {

		// delegamos a cada dao espec�fico la creaci�n del query builder.
		$queryBuilder = $this->getQueryBuilder($criteria);

		$this->enhanceQueryBuild($queryBuilder, $criteria);
										
		
		//paginaci�n.
		$queryBuilder->setFirstResult( $criteria->getOffset() );
   		$queryBuilder->setMaxResults( $criteria->getMaxResult() );
		
   		$orders = $criteria->getOrders();
   		foreach ($orders as $order) {
   			$queryBuilder->addOrderBy( $this->getFieldName($order["name"]) , $order["type"] );
   			//Logger::log($order["name"] . ":" . $order["type"], __CLASS__);
   		}
   		
		//obtenemos el query del builder.
		return $queryBuilder->getQuery();
	}

	/**
	 * arma un query para contar entities dado un criterio de b�squeda.
	 * 
	 * @param ICriteria criteria
	 * @return
	 */
	protected function getQueryCount(ICriteria $criteria) {

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		// delegamos a cada dao espec�fico la creaci�n del query builder.
		$queryBuilder = $this->getQueryCountBuilder($criteria);

		$this->enhanceQueryBuild($queryBuilder, $criteria);
		
		//obtenemos el query del builder.
		return $queryBuilder->getQuery();
	}
	
	protected function getFieldName($name){
		return $name;
	}
	
}