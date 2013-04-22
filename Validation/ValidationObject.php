<?php

class Tx_NlContact_Validation_ValidationObject {

	/**
	 * Object subject to validation
	 * @var mixed
	 */
	protected $subject;

	/**
	 * @var array
	 */
	protected $constraints;

	/**
	 * @param mixed $subject
	 */
	public function __construct($subject) {
		$this->subject = $subject;
	}

	/**
	 * @param $propertyName
	 * @param $validatorClassName
	 * @param array $validatorOptions
	 * @return Tx_NlContact_Validation_ConstraintInterface
	 */
	public function valid($propertyName, $validatorClassName, $validatorOptions = array()) {
		return new Tx_NlContact_Validation_Constraint($propertyName, $validatorClassName, $validatorOptions);
	}

	/**
	 * @param Tx_NlContact_Validation_ConstraintInterface|array $constraints
	 * @return Tx_NlContact_Validation_ConstraintInterface
	 */
	public function logicalAnd($constraints) {
		if (!is_array($constraints)) {
			$constraints = func_get_args();
		}

		return new Tx_NlContact_Validation_Constraint_LogicalAndConstraint($constraints);
	}

	/**
	 * @param Tx_NlContact_Validation_ConstraintInterface|array $constraints
	 * @return Tx_NlContact_Validation_ConstraintInterface
	 */
	public function logicalOr($constraints) {
		if (!is_array($constraints)) {
			$constraints = func_get_args();
		}

		return new Tx_NlContact_Validation_Constraint_LogicalOrConstraint($constraints);
	}

	/**
	 * @param Tx_NlContact_Validation_ConstraintInterface $constraint
	 * @return Tx_NlContact_Validation_ConstraintInterface
	 */
	public function logicalNot(Tx_NlContact_Validation_ConstraintInterface $constraint) {
		return new Tx_NlContact_Validation_Constraint_LogicalNotConstraint($constraint);
	}

	/**
	 * @param Tx_NlContact_Validation_ConstraintInterface|array $constraints
	 * @return Tx_NlContact_Validation_ValidationObject
	 */
	public function matching($constraints) {
		if (!is_array($constraints)) {
			$this->constraints = array($constraints);
		} else {
			$this->constraints = $constraints;
		}
		return $this;
	}

	/**
	 * @return Tx_NlContact_Validation_ValidationResult
	 */
	public function getValidationResult() {
		foreach ($this->constraints as $constraint) {

		}
		return $this->logicalAnd($this->constraints)->getResult($this->subject);
	}

}