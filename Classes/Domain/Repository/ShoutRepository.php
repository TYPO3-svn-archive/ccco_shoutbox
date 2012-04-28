<?php

/***************************************************************
 *  Copyright notice                                                                                                 
 *      .                                                                                              
 *  .MMMM    .   ...                                                                                   
 *  .MMMM.. ZM.  ZM.                                                                                   
 *   .MM8 =7MMM=, D       . ... ..  .  .... .... ..   ..    ..       ..  .  .     .  ..                
 *       MMMMMMMM. .     .M M   M  M  . .?. M  ...    M     .M.      ,M  8   N M  M M ,                
 *    .?MMMMMM+MMMM.     .M.M  +.. .  MM..  M.  M     M    .M?.      D ?.   Z M    7.                  
 *     :MMMM+MMMMMM.     Z    .M..Z. .  M   :.. M   . . .  M..7      ..OM   M. M   M.                  
 *        MMMMMMM M~                                                                                    
 *     ,M  +MM.7M.                                                                                     
 *      ?M   7M.   
 *      2012 copyright by pusilla.net // tomeccco <info@pusilla.net>  
 *      All rights reserved  
 *
 *  This script is my first extbase project. 
 *  It's free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * A repository for shouts
 */
class Tx_CccoShoutbox_Domain_Repository_ShoutRepository extends Tx_Extbase_Persistence_Repository {	

	/**
	* Find amount of shouts 
	* @param number $limit limit
	* @return object 
	* */
	public function findAmount($limit = 7) {
		$query = $this->createQuery();
		$query->setOrderings(array('date' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING));
		$query->setLimit((integer)$limit);
		$result = $query->execute();				
		return $result;
	}
	
}
?>