<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
 *  (c) 2011 Bastian Waidelich <bastian@typo3.org>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
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
 * The blog controller for the BlogExample extension
 */
class Tx_CccoShoutbox_Controller_ShoutController extends Tx_Extbase_MVC_Controller_ActionController{

	/**
	 * @var Tx_BlogExample_Domain_Model_PostRepository
	 */
	protected $postRepository;

	/**
	 * @var Tx_BlogExample_Domain_Repository_AdministratorRepository
	 */
	protected $administratorRepository;



	/**
	 * Index action for this controller. Displays a list of blogs.
	 *
	 * @return void
	 */
	public function indexAction() {
		//$this->view->assign('blogs', $this->blogRepository->findAll());
	}
	
	/**
	 * Creates a new Shout in the Database
	 *
	 * @param Tx_BlogExample_Domain_Model_Shout $shout A fresh Shout object which has not yet been added to the repository
	 * @return void
	 */
	 public function addShout(){
		 /**/
		 $shout->addShout($shout);
	 }
	 
	 /**
	 * Creates a new post
	 *
	 * @param Tx_BlogExample_Domain_Model_Blog $blog The blog the post belogns to
	 * @param Tx_BlogExample_Domain_Model_Post $newBlog A fresh Blog object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_BlogExample_Domain_Model_Blog $blog, Tx_BlogExample_Domain_Model_Post $newPost) {
		// TODO access protection
		$blog->addPost($newPost);
		$newPost->setBlog($blog);
		$this->addFlashMessage('created');
		$this->redirect('index', NULL, NULL, array('blog' => $blog));
	}
	
	
	/**
	 * Creates a new Shout in the Database
	 *
	 * @param Tx_BlogExample_Domain_Model_Blog $newBlog A fresh Blog object which has not yet been added to the repository
	 * @return void
	 */
	 public function getData(){
		 /**/
		 $db_host="localhost";
		 $db_user="tomi";
		 $db_pass="tomi";
		 $db_name="000_extbasextensions_org";
		 $connect=@mysql_connect($db_host, $db_user, $db_pass) or die ("keine verbindung zum Datenbankserver!");
		 $select_db=@mysql_select_db($db_name) or die ("Konnte die Datenbank <b> $db_name </b> nicht auswählen!");
		 $name = $_POST['name'];
		 $location = $_POST['location'];
		 $sql = "INSERT INTO tx_ccco_shoutbox_domain_model_shout (uid, pid, name, shout, date) VALUES (NULL, '', '$name', '$location', '');";
		 $rst = mysql_query($sql); 
	 }

	/**
	 * Displays a form for creating a new blog
	 *
	 * @param Tx_BlogExample_Domain_Model_Blog $newBlog A fresh blog object taken as a basis for the rendering
	 * @return void
	 * @dontvalidate $newBlog
	 */
	public function newAction(Tx_BlogExample_Domain_Model_Blog $newBlog = NULL) {
		$this->view->assign('newBlog', $newBlog);
		$this->view->assign('administrators', $this->administratorRepository->findAll());
	}
	
}

?>