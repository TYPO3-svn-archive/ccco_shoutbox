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
	 * @var string
	 */
	protected $date;

	public function __construct() {
		/*nothing at the moment;*/
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
	 * @param string $shout
	 * @return void
	 */
	public function setShout($shout) {
		$this->shout = $shout;
	}



}
?>