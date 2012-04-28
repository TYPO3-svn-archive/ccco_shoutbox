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
	 * @return string The rendered view
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return string
	 * @dontvalidate $shout
	 */
	public function indexAction(Tx_CccoShoutbox_Domain_Model_Shout $shout = NULL) {
		//i serve the template with a var called shout
		$this->view->assign('shouts', $this->shoutRepository->findAmount());
		$this->view->assign('shout', $shout);
		if ($shout == NULL) {
            //$myForm = new Tx_MyExt_Domain_Model_MyForm;
        } else {
            $formErrors = $this->request->getErrors();
            //$formErrors = $formErrors['myForm']->getErrors();
            $this->view->assign('formErrors', $formErrors);
        }
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
	 }

	 /**
	 * Creates a new shout
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return void
	 */
	 public function createshoutAction(Tx_CccoShoutbox_Domain_Model_Shout $shout){	 
	 	$this->shoutRepository->add($shout);
		$this->redirect('index');
	 }
	 
	 /**
	 * Creates a new shout
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout 
	 * @return void
	 */
	 public function createshoutajaxAction(Tx_CccoShoutbox_Domain_Model_Shout $shout){	 
	 	$this->shoutRepository->add($shout);
		$this->forward('readshoutajax');
		//$this->redirect('readshoutajax');
		/*$tempdate = $shout->getDate();
		return json_encode(
			array(
      			'name'  => $shout->getName(),
				'date' => $shout->getDate(),
      			'shout'   => $shout->getShout(),
    		)
		);*/
	 }
	 
	  /**
	 * Creates a new shout
	 *
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout 
	 * @return void
	 */
	 public function readshoutajaxAction(Tx_CccoShoutbox_Domain_Model_Shout $shout){	
	 //$this->view->assign('shouts', $this->shoutRepository->findAmount());
	 	$tempdate = $shout->getDate(); 
		return json_encode(
			array(
      			'name'  => $shout->getName(),
				'date' => $shout->getDate(),
      			'shout'   => $shout->getShout(),
    		)
		);
	 }
	 
	/**
	 * Displays a list of shouts
	 * @return string The rendered view
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return string
	 * @dontvalidate $shout
	 */
	public function archiveAction() {
		//i serve the template with a var called shout
		$this->view->assign('shouts', $this->shoutRepository->findAll());
		//$this->view->assign('shout', $shout);
	}
	
	/**
	 * Displays a list of shouts
	 * @return string The rendered view
	 * @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return string
	 * @dontvalidate $shout
	 */
	public function archiveajaxAction() {
		//i serve the template with a var called shout
		//return "hello";
		$this->view->assign('shouts', $this->shoutRepository->findAll());
		//$this->view->assign('shout', $shout);
	}
	
	/**
	 * Displays a archivelist of shouts
	 * @return string The rendered view
	 */
	public function arcvajxAction() {
		$this->view->assign('shouts', $this->shoutRepository->findAll());
	}
	
	/**
	 * Displays a the domwindow where arcveajdta will be loaded
	 * @return string The rendered view
	 */
	public function domwdwAction() {
		$this->view->assign('shouts', $this->shoutRepository->findAll());
	}
	
	 /**
	 * Reads shoutarchive
	 *
	 * ****@param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	 * @return void
	 */
	 public function readarchiveajaxAction(){	 
	 	$this->view->assign('shouts', $this->shoutRepository->findAll());
	 }
	 
}
?>