<?php

namespace Cose\utils;

use Doctrine\DBAL\Logging\SQLLogger;
use Logger;

/**
 * A SQL logger for Doctrine.
 * Implementado con log4php
 */
class LogDoctrine implements SQLLogger{
	
	private $logger = null;
	
	public function __construct() {
		$this->logger = Logger::getLogger(__CLASS__);	
	}
	
    /**
     * (non-PHPdoc)
     * @see Doctrine\DBAL\Logging.SQLLogger::startQuery()
     */
    public function startQuery($sql, array $params = null, array $types = null) {
    	
    	$str  = "\n==========================\n";
    	$str .= "Sql: " . $sql . "\n";
    	$str .= "Params: " . print_r($params, true) . "\n"; 
    	$str .= "Types: " . print_r($types, true) . "\n";
    	$str .= "==========================\n";
    	$this->logger->debug($str);
    	
    }

    /**
     * (non-PHPdoc)
     * @see Doctrine\DBAL\Logging.SQLLogger::stopQuery()
     */
    public function stopQuery(){
		$this->logger->debug("stop query");
    }
    
}

?>