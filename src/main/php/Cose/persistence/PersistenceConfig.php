<?php

namespace Cose\persistence;


use Cose\utils\LogDoctrine;

use Cose\utils\Map;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;

class PersistenceConfig {
	
	private static $units;

	private static $defaultUnit="default";
	
	public static function setDefaultUnit( $unitName ){
		self::$defaultUnit = $unitName;
	}
	
	public static function getDefaultUnit( ){
		return self::$defaultUnit;
	}
	
	public static function configure($unitName, $namespaceProxies, $pathProxies, $pathEntities, $connectionOptions, $caching=false) {
		
		// configuration (2)
		$config = new Configuration();
		
		// Proxies (3)
		$config->setProxyDir($pathProxies);
		$config->setProxyNamespace($namespaceProxies);
		
		$config->setAutoGenerateProxyClasses(true);
		
		$doctrineLogger = new LogDoctrine();
		$config->setSQLLogger($doctrineLogger);
		
		// Driver (4)
		$driverImpl = $config->newDefaultAnnotationDriver(array($pathEntities));
		$config->setMetadataDriverImpl($driverImpl);
		//createAnnotationMetadataConfiguration( explode(",", CLASS_PATH), $isDevMode);
		
		
		//$config->addCustomDatetimeFunction("YEAR", "Doctrine\Extension\Functions\YearFunction");
		//$config->addCustomDatetimeFunction("MONTH", "Doctrine\Extension\Functions\MonthFunction");
		
		// Caching Configuration (5)
		if ($caching) {
		    $cache = new \Doctrine\Common\Cache\ApcCache();
		} else {
			$cache = new \Doctrine\Common\Cache\ArrayCache();
		}
		
		$config->setMetadataCacheImpl($cache);
		$config->setQueryCacheImpl($cache);
		$config->setResultCacheImpl($cache);
		
		$unit = new PersistenceUnit();
		$unit->setConfig($config);
		$unit->setConnectionOptions($connectionOptions);
		
		self::addUnit($unitName, $unit);
		
	}
	
	public static function getUnits() {
		if(self::$units == null){
			self::$units = new Map();
		}
		return self::$units;
	}

	/**
	 * Agrega una unidad de persistencia
	 * @param unknown_type $unitName
	 * @param PersistenceUnit $unit
	 */
	public static function addUnit($unitName, $unit) {
		self::getUnits()->put($unitName, $unit );
	}
	
	/**
	 * recupera la unidad dado su nombre
	 * @param unknown_type $unitName
	 */
	public static function getUnit($unitName) {
		return self::getUnits()->get($unitName );
	}
}

?>