<?php

namespace Agares\AxeOrchestra\Domain;

class Hostname
{
	public static function fromString(string $name)
	{
		static::validate($name);

		return new Hostname($name);
	}

	private static function validate(string $name) {
		$labels = explode('.', $name);

		foreach($labels as $label)
			static::validateLabel($label);
	}

	private static function validateLabel(string $label)
	{
		if(!preg_match('/^[a-z0-9][0-9a-z\\-]*$/i', $label))
			throw InvalidHostnameException::label($label);
	}
}