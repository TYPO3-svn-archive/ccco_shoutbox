<?php

/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */


class Tx_CccoShoutbox_ViewHelpers_ForxViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper{

	/**
	 * Iterates through elements of $eachtt and renders child nodes
	 *
	 * @param array $eachtt The array or Tx_Extbase_Persistence_ObjectStorage to iterated over
	 * @param string $astt The name of the iteration variable
	 * @param string $keytt The name of the variable to store the current array key
	 * @param boolean $reversett If enabled, the iterator will start with the last element and proceed reversely
	 * @param string $iterationtt The name of the variable to store iteration information (index, cycle, isFirst, isLast, isEven, isOdd)
	 * @return string Rendered string
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 * @author Bastian Waidelich <bastian@typo3.org>
	 * @author Robert Lemke <robert@typo3.org>
	 * @api
	 */
	public function render($eachtt, $astt, $keytt = '', $reversett = FALSE, $iterationtt = NULL) {
		
		$ouptstngtmp = self::renderStatic($this->arguments, $this->buildRenderChildrenClosure(), $this->renderingContext); 
		//--build array from listpoints
		$change = array("<li>");
		$place = array("");
		$ouptstngtmp = str_replace($change, $place, $ouptstngtmp);
		$ouptarngtmp = explode("</li>", $ouptstngtmp);
		$orgarsz = sizeof($ouptarngtmp);
		for($i=0;$i<sizeof($ouptarngtmp)-1;$i++){
			$stringafterbr = strrchr($ouptarngtmp[$i],'<br />');
			$stringbeforebr = strstr($ouptarngtmp[$i],'<br />',true);
			$stringwordwrapedafterbr = wordwrap($stringafterbr,60,'<br />');
			$bothstrings = $stringbeforebr.$stringwordwrapedafterbr;
			$substringcounted = substr_count($bothstrings, '<br />');
			$lines += intval($substringcounted)+1;
			$ouptarngtmp[$i] = '<li>'.$bothstrings.'</li>';
			if($lines>7){
				//$ouptarngtmp = array_pop($ouptarngtmp);
				//var_dump($ouptstngtmp);
				while($i<$orgarsz){
					unset($ouptarngtmp[$i]);// = '[c]';///array_pop($ouptarngtmp);
					$i++;
					echo'kkk';
				}
				break;
			}
			echo $ouptarngtmp[$i];
			echo 'linessrt'.$lines.'linessrt';
			
		}
		echo '-----srt-----';
 		echo $ouptstngtmp;
		echo '-----end-----';
		$ouptstngtmp = implode("",$ouptarngtmp);
		//var_dump($ouptstngtmp);
		//echo 'dddd'.$ouptarngtmp[0];
		return $ouptstngtmp;
	}

	/**
	 * @param array $arguments
	 * @param Closure $renderChildrenClosure
	 * @param Tx_Fluid_Core_Rendering_RenderingContextInterface $renderingContext
	 * @return string
	 */
	static public function renderStatic(array $arguments, Closure $renderChildrenClosure, Tx_Fluid_Core_Rendering_RenderingContextInterface $renderingContext) {
		//var_dump($arguments);
		//echo 'ddd'.count($arguments['eachtt']);
		$templateVariableContainer = $renderingContext->getTemplateVariableContainer();
		if ($arguments['eachtt'] === NULL) {
			return '';
			//echo 'd';
		}
		if (is_object($arguments['eachtt']) && !$arguments['eachtt'] instanceof Traversable) {
		//	echo 'dd';
			throw new Tx_Fluid_Core_ViewHelper_Exception('ForViewHelper only supports arrays and objects implementing Traversable interface' , 1248728393);
		}

		if ($arguments['reversett'] === TRUE) {
		//	echo 'ddd';
				// array_reverse only supports arrays
			if (is_object($arguments['eachtt'])) {
				$arguments['eachtt'] = iterator_to_array($arguments['eachtt']);
			}
			$arguments['eachtt'] = array_reverse($arguments['eachtt']);
		}
		$iterationData = array(
			'index' => 0,
			'cycle' => 1,
			'total' => count($arguments['eachtt'])
		);

		$output = '';
		foreach ($arguments['eachtt'] as $keyValue => $singleElement) {
			//echo $arguments['astt'];
			//echo $singleElement;
			//echo Tx_CccoShoutbox_Domain_Model_Shout:301;
			$templateVariableContainer->add($arguments['astt'], $singleElement);
			if ($arguments['keytt'] !== '') {
				$templateVariableContainer->add($arguments['keytt'], $keyValue);
			}
			if ($arguments['iterationtt'] !== NULL) {
				$iterationData['isFirst'] = $iterationData['cycle'] === 1;
				$iterationData['isLast'] = $iterationData['cycle'] === $iterationData['total'];
				$iterationData['isEven'] = $iterationData['cycle'] % 2 === 0;
				$iterationData['isOdd'] = !$iterationData['isEven'];
				$templateVariableContainer->add($arguments['iterationtt'], $iterationData);
				$iterationData['index'] ++;
				$iterationData['cycle'] ++;
			}
			$output .= $renderChildrenClosure();

			$templateVariableContainer->remove($arguments['astt']);
			if ($arguments['keytt'] !== '') {
				$templateVariableContainer->remove($arguments['keytt']);
			}
			if ($arguments['iterationtt'] !== NULL) {
				$templateVariableContainer->remove($arguments['iterationtt']);
			}
		}
		return $output;
	}
}

?>