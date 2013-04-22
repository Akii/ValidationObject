<?php

class Tx_NlContact_Validation_Constraint_LogicalAndConstraint implements Tx_NlContact_Validation_ConstraintInterface {

	/**
	 * @var array<Tx_NlContact_Validation_ConstraintInterface>
	 */
	protected $constraints;

	public function __construct(array $constraints) {
		$this->constraints = $constraints;
	}

	/**
	 * @param mixed $subject
	 * @return Tx_NlContact_Validation_ValidationResult
	 */
	public function getResult($subject) {
		$result = new Tx_NlContact_Validation_ValidationResult();
		foreach ($this->constraints as $constraint) {
			$constraintResult = $constraint->getResult($subject);
			if ($constraintResult->hasErrors()) {
				$result->addErrors($constraintResult);
			}
		}
		return $result;
	}

}