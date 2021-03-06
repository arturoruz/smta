<?php
use Mojavi\Action\BasicRestAction;
use Mojavi\View\View;
use Mojavi\Request\Request;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class DropMapAction extends BasicRestAction
{
	const DEBUG = MO_DEBUG;

	/**
	 * Returns the form to use for this rest request
	 * @return Form
	 */

	public function getInputForm() {
		return new \Smta\Drop();
	}

	/**
	 * Perform any execution code for this action
	 * @return integer (View::SUCCESS, View::ERROR, View::NONE)
	 */
	public function execute ()
	{
		return parent::execute();
	}
	
	/**
	 * Executes a PUT request
	 * @return \Mojavi\Form\BasicAjaxForm
	 */
	function executePost($input_form) {
		// Handle PUT Requests
		$ajax_form = new \Mojavi\Form\BasicAjaxForm();
		$rows_affected = $input_form->updateMapping();
		if (isset($rows_affected['n'])) {
			$ajax_form->setRowsAffected($rows_affected['n']);
		}
		$ajax_form->setRecord($input_form);
		return $ajax_form;
	}
	
	/**
	 * Executes a PUT request
	 * @return \Mojavi\Form\BasicAjaxForm
	 */
	function executePut($input_form) {
		return $this->executePost($input_form);
	}
}

?>