<?php

namespace Agares\AxeOrchestra\Domain;

class InvalidHostnameException extends \Exception
{
	public static function hostname($hostname) {
		return new static(sprintf('The hostname "%s" is invalid.', $hostname));
	}

	public static function label($label) {
		return new static(sprintf('The label "%s" is invalid', $label));
	}
}