<?php

namespace fixtures\Domain;

use Agares\AxeOrchestra\Domain\Hostname;

class HostnameTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider  validHostnameProvider
	 */
	public function testCanBeCreatedFromString($name) {
		$hostname = Hostname::fromString($name);

		$this->assertNotNull($hostname);
	}

	public function validHostnameProvider() {
		return [
			['metatron'],
			['metatron.agares.info'],
			['luc-i-fer'],
			['8agares'],
			['aga8res'],
			['z.agares.info']
		];
	}

	/**
	 * @dataProvider invalidHostnameProvider
	 * @expectedException \Agares\AxeOrchestra\Domain\Exceptions\InvalidHostnameException
	 */
	public function testCannotCreateInvalidHostname($name) {
		Hostname::fromString($name);
	}

	public function invalidHostnameProvider() {
		return [
			['-metatron.agares.info'],
			['metatron.-agares.info'],
			['metatron.agares.-info'],
			['ó.agares.info'],
			['.agares.info']
		];
	}
}
