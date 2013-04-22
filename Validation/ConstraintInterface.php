<?php

interface Tx_NlContact_Validation_ConstraintInterface {

	/**
	 * @param mixed $subject Subject to validate constraint against
	 * @return Tx_NlContact_Validation_ValidationResult
	 */
	public function getResult($subject);

}