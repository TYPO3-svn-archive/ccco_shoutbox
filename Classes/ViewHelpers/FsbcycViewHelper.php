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


class Tx_CccoShoutbox_ViewHelpers_FsbcycViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper{

	/**
	 * Iterates through elements of $each and renders child nodes
	 *
	 * @param array $each The array or Tx_Extbase_Persistence_ObjectStorage to iterated over
	 * @param string $as The name of the iteration variable
	 * @param string $key The name of the variable to store the current array key
	 * @param boolean $reverse If enabled, the iterator will start with the last element and proceed reversely
	 * @param string $iteration The name of the variable to store iteration information (index, cycle, isFirst, isLast, isEven, isOdd)
	 * @return string Rendered string
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 * @author Bastian Waidelich <bastian@typo3.org>
	 * @author Robert Lemke <robert@typo3.org>
	 * @api
	 */
	public function render($each, $as, $key = '', $reverse = FALSE, $iteration = NULL) {
		
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
			// check if last string after br is shorter then 4
			$lstsng = strrchr($stringwordwrapedafterbr,'<br />');
			$lstsng = str_replace('<br />', '', $lstsng);
			$lstsng = trim($lstsng);
			if(strlen($lstsng)<4){
				// get string after last  br
				// echo 'dd'.$stringwordwrapedafterbr.'dd';
				$sdlstsngbr = strrchr($stringwordwrapedafterbr,'<br />');
				// echo 'after last break'.$sdlstsngbr.'after last break';
				// get string before and with last br
				$sdlstsnbgbbr = str_replace($sdlstsngbr, '',$stringwordwrapedafterbr);
				// echo 'before and without last break'.$sdlstsnbgbbr.'before and without last break';
				// get last word and space  from last resultstring
				$sdlstsngbraa = strrchr($sdlstsnbgbbr,' ');
				// echo 'last word'.$sdlstsngbraa.'last word';
				// replace last space word with space break word
				$dsfdsfasdfa = str_replace($sdlstsngbraa, '<br />'.$sdlstsngbraa,$sdlstsnbgbbr);
				// echo 'with break'.$dsfdsfasdfa.'with break';
				// connect partialstrings to complete string
				$stringwordwrapedafterbr = $dsfdsfasdfa.strip_tags($sdlstsngbr);
				// echo 'final'.$stringwordwrapedafterbr.'final';
			}
			$bothstrings = $stringbeforebr.$stringwordwrapedafterbr;
			$substringcounted = substr_count($bothstrings, '<br />');
			$lines += intval($substringcounted)+1;
			$ouptarngtmp[$i] = '<li>'.$bothstrings.'</li>';
			if($lines>13){
				while($i<$orgarsz){
					unset($ouptarngtmp[$i]);// = '[c]';///array_pop($ouptarngtmp);
					$i++;
				}
				break;
			}
		}
		$ouptstngtmp = implode("",$ouptarngtmp);
		return $ouptstngtmp;
	}

	/**
	 * @param array $arguments
	 * @param Closure $renderChildrenClosure
	 * @param Tx_Fluid_Core_Rendering_RenderingContextInterface $renderingContext
	 * @return string
	 */
	static public function renderStatic(array $arguments, Closure $renderChildrenClosure, Tx_Fluid_Core_Rendering_RenderingContextInterface $renderingContext) {
		$templateVariableContainer = $renderingContext->getTemplateVariableContainer();
		if ($arguments['each'] === NULL) {
			return '';
		}
		if (is_object($arguments['each']) && !$arguments['each'] instanceof Traversable) {
			throw new Tx_Fluid_Core_ViewHelper_Exception('ForViewHelper only supports arrays and objects implementing Traversable interface' , 1248728393);
		}

		if ($arguments['reverse'] === TRUE) {
			if (is_object($arguments['each'])) {
				$arguments['each'] = iterator_to_array($arguments['each']);
			}
			$arguments['each'] = array_reverse($arguments['each']);
		}
		$iterationData = array(
			'index' => 0,
			'cycle' => 1,
			'total' => count($arguments['each'])
		);

		$output = '';
		foreach ($arguments['each'] as $keyValue => $singleElement) {
			$templateVariableContainer->add($arguments['as'], $singleElement);
			if ($arguments['key'] !== '') {
				$templateVariableContainer->add($arguments['key'], $keyValue);
			}
			if ($arguments['iteration'] !== NULL) {
				$iterationData['isFirst'] = $iterationData['cycle'] === 1;
				$iterationData['isLast'] = $iterationData['cycle'] === $iterationData['total'];
				$iterationData['isEven'] = $iterationData['cycle'] % 2 === 0;
				$iterationData['isOdd'] = !$iterationData['isEven'];
				$templateVariableContainer->add($arguments['iteration'], $iterationData);
				$iterationData['index'] ++;
				$iterationData['cycle'] ++;
			}
			$output .= $renderChildrenClosure();

			$templateVariableContainer->remove($arguments['as']);
			if ($arguments['key'] !== '') {
				$templateVariableContainer->remove($arguments['key']);
			}
			if ($arguments['iteration'] !== NULL) {
				$templateVariableContainer->remove($arguments['iteration']);
			}
		}
		return $output;
	}
}


?>
