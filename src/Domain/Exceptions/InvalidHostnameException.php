<?php

namespace Agares\AxeOrchestra\Domain\Exceptions;

final class InvalidHostnameException extends \Exception
{
	public static function label($label) : self {
		return new static(sprintf('The label "%s" is invalid', $label));
	}
}