<?php

class Tx_NlContact_Validation_Constraint implements Tx_NlContact_Validation_ConstraintInterface {

	/**
	 * @var string
	 */
	protected $propertyName;

	/**
	 * @var string
	 */
	protected $validatorClassName;

	/**
	 * @var array
	 */
	protected $validatorOptions;

	public function __construct($propertyName, $validatorClassName, $validatorOptions = array()) {
		$this->propertyName = $propertyName;
		$this->validatorClassName = $validatorClassName;
		$this->validatorOptions = $validatorOptions;
	}

	/**
	 * @param mixed $subject
	 * @return Tx_NlContact_Validation_ValidationResult
	 */
	public function getResult($subject) {
		$getterFunction = 'get' . ucfirst($this->propertyName);
		$valueToValidate = $subject->$getterFunction();

		$validator = t3lib_div::makeInstance($this->validatorClassName);
		$validator->setOptions($this->validatorOptions);

		$result = new Tx_NlContact_Validation_ValidationResult();

		$propertyIsValid = $validator->isValid($valueToValidate);
		if (!$propertyIsValid) {
			$propertyError = new Tx_Extbase_Validation_PropertyError($this->propertyName);
			$propertyError->addErrors($validator->getErrors());
			$result->addError($propertyError);
		}
		return $result;
	}

}