<?php

namespace Agares\AxeOrchestra\Domain;

final class InvalidMacAddressException extends \Exception
{
	public static function address($address) : self {
		return new self(sprintf('Invalid mac address: %s', $address));
	}
}