<?php
namespace Agares\AxeOrchestra\Domain\Exceptions;

final class InvalidMemoryAmountException extends \Exception
{
	public static function amount(int $amount) : self {
		return new InvalidMemoryAmountException(sprintf('Memory amount of %d megabytes is invalid.', $amount));
	}
}