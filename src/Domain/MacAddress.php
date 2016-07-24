<?php

namespace Agares\AxeOrchestra\Domain;

final class MacAddress
{
	const MAC_ADDRESS_REGEXP = '/([a-f0-9]{2}:){5}[a-f0-9]{2}/i';

	/**
	 * @var string
	 */
	private $value;

	private function __construct(string $value) {
		$this->value = $value;
	}

	public static function fromString($value) : self {
		self::validate($value);

		return new MacAddress($value);
	}

	private static function validate($value) {
		if(!preg_match(self::MAC_ADDRESS_REGEXP, $value))
			throw InvalidMacAddressException::address($value);
	}

	public function value() : string {
		return $this->value;
	}
}