<?php

namespace fixtures\Domain;

use Agares\AxeOrchestra\Domain\MacAddress;

class MacAddressTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider validMacAddressProvider
	 */
	public function testCanCreateFromValidString($value) {
		$address = MacAddress::fromString($value);

		$this->assertEquals($value, $address->value());
	}

	public function validMacAddressProvider() {
		return [
			['00:00:00:00:00:00'],
			['12:34:56:78:9a:bc'],
			['de:f0:32:6f:7b:5c']
		];
	}

	/**
	 * @dataProvider invalidMacAddressProvider
	 * @expectedException \Agares\AxeOrchestra\Domain\Exceptions\InvalidMacAddressException
	 */
	public function testCannotCreateInvalidAddress($value) {
		MacAddress::fromString($value);
	}

	public function invalidMacAddressProvider() {
		return [
			['x'],
			['a:b'],
			['aa:zz:zz:zz:zz:zz']
		];
	}
}
