<?php
namespace Cose\criteria;

/**
 * Interface para filtrar b�squedas.
 * 
 * @author bernardo
 *
 */
interface ICriteria{

	/**
	 * @return the offset
	 */
	function getOffset();


	/**
	 * @return the maxResult
	 */
	function getMaxResult();
}
