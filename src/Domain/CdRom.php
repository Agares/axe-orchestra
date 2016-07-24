<?php

namespace Agares\AxeOrchestra\Domain;

final class CdRom implements VirtualDiskInterface
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
		return $this->physicalDevicePath;
	}

	public function writable() : bool {
		return false;
	}
}