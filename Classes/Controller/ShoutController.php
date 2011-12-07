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
	 * @return void
	 */
	public function initializeAction() {
		$this->shoutRepository = t3lib_div::makeInstance('Tx_CccoShoutbox_Domain_Repository_ShoutRepository');
	}
		
	/**
	 * Displays a list of shouts
	 @return string The rendered view
	 */
	public function indexAction(Tx_CccoShoutbox_Domain_Model_Shout $shout = NULL) {
		//i serve the template with a var called shout
		$this->view->assign('shouts', $this->shoutRepository->findAll());
		echo "this is the indexaction get ready for shoutaction why it doesn't";

	}

	/**
	 * Adds a new shout
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return string
	 * @dontvalidate $shout
	 */
	 public function addshoutAction(Tx_CccoShoutbox_Domain_Model_Shout $shout = NULL){
		 $this->view->assign('shout', $shout);	 
	 	echo "we arrived in the ShoutController.php->addshout";
	 }

	 /**
	 * Creates a new shout
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return void
	 */
	 public function createshoutAction(Tx_CccoShoutbox_Domain_Model_Shout $shout){	 
	 	$this->shoutRepository->add($shout);
		echo "we arrived in the ShoutController.php->createshout";
		//$this->redirect('index');
	 }
	 
	 /**
	 * Creates a new shout
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return void
	 */
	 public function createshoutajaxAction(/*Tx_CccoShoutbox_Domain_Model_Shout $shout*/){	 
	 	//$this->shoutRepository->add($shout);
		//echo tx_cccoshoutbox_pi1[shout][name];
		//echo Tx_CccoShoutbox_Domain_Model_Shout $shout;
		echo "we arrived in the ShoutController.php->createshout";
		//$this->view->assign('shouts', $this->shoutRepository->findAll());
		//$this->redirect('index');
		$shouts = $this->shoutRepository->findAll();
		//echo $shouts;
		//echo $this->shoutRepository->findAll();
		
		for($i = 0; $i < 5; $i++){
			$stringshout .= "hjh";	
		}
		echo $stringshout;
		//echo $stringshout;
		//return
	 }
	 
	 /**
     * @return void
     */
	public function ajaxAction() {
        $json = array(
            'jQuery',
            'ExtJS',
            'Prototype',
            'MooTools'
        );

       return json_encode($json);
	}
	 
}

?>