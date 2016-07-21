<?php
namespace Agares\AxeOrchestra\Domain;

class InvalidMemoryAmountException extends \Exception
{
	public static function amount(int $amount) {
		return new InvalidMemoryAmountException(sprintf('Memory amount of %d megabytes is invalid.', $amount));
	}
}