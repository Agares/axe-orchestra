<?php

namespace Agares\AxeOrchestra\Domain;

use Agares\AxeOrchestra\Infrastructure\UUID;

final class CdRom implements VirtualDiskInterface
{
	/**
	 * @var string
	 */
	private $virtualDeviceName;

	/**
	 * @var string
	 */
	private $physicalFilePath;

	/**
	 * @var UUID
	 */
	private $id;

	public function __construct(UUID $id, string $virtualDeviceName, string $physicalFilePath) {
		$this->id = $id;
		$this->virtualDeviceName = $virtualDeviceName;
		$this->physicalFilePath = $physicalFilePath;
	}
	public function id() : UUID {
		return $this->id;
	}

	public function virtualDeviceName() : string {
		return $this->virtualDeviceName;
	}

	public function writable() : bool {
		return false;
	}
}