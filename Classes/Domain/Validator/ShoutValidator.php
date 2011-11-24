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
 * An exemplary Blog validator
 */
class Tx_CccoShoutbox_Domain_Validator_ShoutValidator extends Tx_Extbase_Validation_Validator_AbstractValidator {

	/**
	 * Checks whether the given shout is valid
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Blog $shout The blog
	 * @return boolean TRUE if blog could be validated, otherwise FALSE
	 */
	public function isValid($shout) {
		/*if (strtolower($shout->getTitle()) === 'extbase') {
			$this->addError(Tx_Extbase_Utility_Localization::translate('error.Blog.invalidTitle', 'CccoShoutbox'), 1297418974);
			return FALSE;
		}*/
		return TRUE;
	}

}
?>