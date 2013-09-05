<?php

namespace Cose\persistence;

class PersistenceUnit {

	private $config;
	private $connectionOptions;
	
	
	public function getConfig() {
		return $this->config;
	}

	public function setConfig($config) {
		$this->config = $config;
	}

	public function getConnectionOptions() {
		return $this->connectionOptions;
	}
	
	public function setConnectionOptions($connectionOptions) {
		$this->connectionOptions = $connectionOptions;
	}

}

?>