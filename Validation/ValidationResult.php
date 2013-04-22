<?php

class Tx_NlContact_Validation_ValidationResult {

	/**
	 * @var array<Tx_Extbase_Validation_Error>
	 */
	protected $errors = array();

	/**
	 * @param array|Tx_NlContact_Validation_ValidationResult $errors
	 */
	public function addErrors($errors) {
		if ($errors instanceof Tx_NlContact_Validation_ValidationResult) {
			$errors = $errors->getErrors();
		}

		foreach ($errors as $error) {
			$this->addError($error);
		}
	}

	/**
	 * @param Tx_Extbase_Validation_Error $error
	 */
	public function addError(Tx_Extbase_Validation_Error $error) {
		$this->errors[] = $error;
	}

	/**
	 * @return array<Tx_Extbase_Validation_Error>
	 */
	public function getErrors() {
		return $this->errors;
	}

	/**
	 * @return boolean
	 */
	public function hasErrors() {
		return (count($this->errors) > 0);
	}

}