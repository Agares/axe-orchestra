<?php

namespace fixtures\Domain;

use Agares\AxeOrchestra\Domain\Memory;

class MemoryTest extends \PHPUnit_Framework_TestCase
{
	public function testCanBeCreatedFromMegaBytes() {
		$memory = Memory::fromMegaBytes(1024);

		$this->assertEquals($memory->megabytes(), 1024);
	}

	/**
	 * @expectedException \Agares\AxeOrchestra\Domain\Exceptions\InvalidMemoryAmountException
	 */
	public function testCannotBeCreatedFromZeroMegabytes() {
		Memory::fromMegaBytes(0);
	}

	/**
	 * @expectedException \Agares\AxeOrchestra\Domain\Exceptions\InvalidMemoryAmountException
	 */
	public function testCannotBeCreatedFromNegativeMegabytes() {
		Memory::fromMegaBytes(-1024);
	}
}