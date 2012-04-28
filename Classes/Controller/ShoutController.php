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
	*
	* @return string The rendered view
	* @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	* @return string
	* @dontvalidate $shout
	*/
	public function indexAction(Tx_CccoShoutbox_Domain_Model_Shout $shout = NULL) {
		// i serve the template with a var called shout
		$this->view->assign('shouts', $this->shoutRepository->findAmount());
		$this->view->assign('shout', $shout);
		// if form is sent and $shout is not null
		if ($shout != NULL){
        	$formErrors = $this->request->getErrors();
            $this->view->assign('formErrors', $formErrors);
        }
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
	* Displays a list of shouts
	* @return string The rendered view
	* @param Tx_CccoShoutbox_Domain_Model_Shout $shout  
	* @return string
	* @dontvalidate $shout
	*/
	public function archiveAction() {
		//i serve the template with a var called shout
		$this->view->assign('shouts', $this->shoutRepository->findAll());
	}
	 
	/**
	* Creates a new shout with ajax (activated javascript)
	*
	* @param Tx_CccoShoutbox_Domain_Model_Shout $shout 
	* @return void
	*/
	public function createshoutajxAction(Tx_CccoShoutbox_Domain_Model_Shout $shout){	 
		$this->shoutRepository->add($shout);
		$this->forward('readshoutajax');
	}
	 
	/**
	* Creates a new shout
	*
	* @param Tx_CccoShoutbox_Domain_Model_Shout $shout 
	* @return void
	*/
	public function readshoutajxAction(Tx_CccoShoutbox_Domain_Model_Shout $shout){	
		// write all shouts in a jsonobject 
		return json_encode(
			array(
      			'name'  => $shout->getName(),
				'date' => $shout->getDate(),
      			'shout'   => $shout->getShout(),
    		)
		);
	 }
		
	/**
	* Reads shoutarchive
	*  
	* @return void
	*/
	public function archiveajxAction(){	 
		$this->view->assign('shouts', $this->shoutRepository->findAll());
	}
	 
}
?>