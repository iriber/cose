<?php
namespace Cose\service\impl;

use Cose\security\SecurityContext;

use Cose\utils\ReflectionUtils;

use Cose\exception\ServiceException,
	Cose\exception\DAOException,
	Cose\service\IService;

/**
 * Servicio genérico.
 * 
 * @author bernardo
 *
 */
abstract class Service implements IService{

	/**
	 * dao para maejar la persistencia de la entity.
	 * @return IGenericDAO
	 */
	protected abstract function getDAO();

	
}