<?php

namespace Agares\AxeOrchestra\Domain;

final class WritablePhysicalHdd implements VirtualDiskInterface
{
	/**
	 * @var string
	 */
	private $virtualDeviceName;

	/**
	 * @var string
	 */
	private $physicalDevicePath;

	public function __construct(string $virtualDeviceName, string $physicalDevicePath) {
		$this->virtualDeviceName = $virtualDeviceName;
		$this->physicalDevicePath = $physicalDevicePath;
	}

	public function virtualDeviceName() : string {
		return $this->virtualDeviceName;
	}

	public function writable() : bool {
		return true;
	}
}