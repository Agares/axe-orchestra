<?php

namespace Agares\AxeOrchestra\Domain;

use Agares\AxeOrchestra\Infrastructure\UUID;

final class WritablePhysicalHdd implements VirtualDiskInterface
{
	/**
	 * @var UUID
	 */
	private $id;

	/**
	 * @var string
	 */
	private $virtualDeviceName;

	/**
	 * @var string
	 */
	private $physicalDevicePath;

	public function __construct(UUID $id, string $virtualDeviceName, string $physicalDevicePath) {
		$this->id = $id;
		$this->virtualDeviceName = $virtualDeviceName;
		$this->physicalDevicePath = $physicalDevicePath;
	}

	public function id() : UUID {
		return $this->id;
	}

	public function virtualDeviceName() : string {
		return $this->virtualDeviceName;
	}

	public function writable() : bool {
		return true;
	}
}