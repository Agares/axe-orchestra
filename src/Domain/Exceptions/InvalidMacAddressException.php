<?php

namespace Agares\AxeOrchestra\Domain\Exceptions;

final class InvalidMacAddressException extends \Exception
{
	public static function address($address) : self {
		return new self(sprintf('Invalid mac address: %s', $address));
	}
}