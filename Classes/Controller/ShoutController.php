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
 * The shout controller for the CccoShoutbox extension
 */
class Tx_CccoShoutbox_Controller_ShoutController extends Tx_Extbase_MVC_Controller_ActionController{
	
	/**
	 * @var Tx_CccoShoutbox_Domain_Repository_ShoutRepository
	 */
	protected $shoutRepository;
		
	/**
+	 * Dependency injection of the Shout Repository
 	 *
	 * @param Tx_CccoShoutbox_Domain_Repository_ShoutRepository $shoutRepository
 	 * @return void
-	 */
	public function injectShoutRepository(Tx_CccoShoutbox_Domain_Repository_ShoutRepository $shoutRepository) {
		$this->shoutRepository = $shoutRepository;
	}

	/**
	 * Displays a list of posts. If $tag is set only posts matching this tag are shown
	 *
	 */
	public function indexAction() {
		//i serve the template with a var called shout
		$this->view->assign('shout', 'shout');
		echo "this is the indexaction get ready for shoutaction why it doesn't";

	}
	
	/**
	 * Creates a new shout
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout the shout 
	 * @return void
	 */
	 public function addshoutAction(Tx_CccoShoutbox_Domain_Model_Shout $shout){	 
		 echo "techno";
		 echo "schnaps";
		 echo $shout;
	 }
}

?>