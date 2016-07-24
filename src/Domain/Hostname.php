<?php

namespace Agares\AxeOrchestra\Domain;

use Agares\AxeOrchestra\Domain\Exceptions\InvalidHostnameException;

final class Hostname
{
	const LABEL_REGEXP = '/^[a-z0-9][0-9a-z\\-]*$/i';
	const LABEL_SEPARATOR = '.';

	public static function fromString(string $name)
	{
		static::validate($name);

		return new Hostname($name);
	}

	private static function validate(string $name) {
		$labels = explode(self::LABEL_SEPARATOR, $name);

		foreach($labels as $label)
			static::validateLabel($label);
	}

	private static function validateLabel(string $label) {
		if(!preg_match(self::LABEL_REGEXP, $label))
			throw InvalidHostnameException::label($label);
	}
}