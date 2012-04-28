<?php
class Tx_CccoShoutbox_ViewHelpers_ShoutViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
 
 	/**
	* Some lines of comment on what your view helper is about to do
	*
  	* IMPORTANT: Make sure, you have the following @param and @return comments
	* @param int $each The number of characters of the dummy content
 	* @param object $eachx The number of characters of the dummy content
	* @return string
	*/
	public function render($each,$eachx) {
		/*$a = array ('a' => 'Apfel', 'b' => 'Banane', 'c' => array ('x', 'y', 'z'));
    	print_r ($a);
		$output = print_r($a,true);
		///$output = $each;
		return $output;*/
		//$eachx = gettype($eachx);(string)$objekt
		$eachi = gettype($eachx);
		$eachi = serialize($eachx);
		return $each.$eachi;
	}
 
}
 
?>

