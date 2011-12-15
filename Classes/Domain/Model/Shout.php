<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Tom Bocek <info@pusilla.net>
 *  All rights reserved
 *
 *  This script is my first extbase project. The extbase project is
 *  free software; you can redistribute it and/or modify
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
 * A shout
 */
class Tx_CccoShoutbox_Domain_Model_Shout extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $shout;

	/**
	 * @var DateTime
	 */
	protected $date;
	
	/**
	* @var string
	*/
	protected $unixdate;
	
	public function __construct() {
		$this->date = new DateTime();
	}
	
	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Returns the shouts
	 *
	 * @return Tx_CccoShoutbox_Domain_Model_Shout the shout
	 */
	public function getShout() {
		return $this->shout;
	}

	/**
	 * Setter for shout
	 *
	 * @param string $content
	 * @return void
	 */
	public function setShout($content) {
		//$this->description = $content
		$this->shout = $content;
	}
	
	/**
	 * @param DateTime $date
	 * @return void
	 */
	public function setDate(DateTime $date) {
		$this->date = $date;
	}

	/**
	 * @return DateTime
	 */
	public function getDate() {
		$tempdate = $this->date;
		//$tempdate->format('d-m-Y H:i'),
		return $tempdate->format('d-m-Y H:i');
	}
	
	/**
	 * @return string
	 */
	public function getUnixDate() {		
		return $this->$unixdate;		
	}




}
?>