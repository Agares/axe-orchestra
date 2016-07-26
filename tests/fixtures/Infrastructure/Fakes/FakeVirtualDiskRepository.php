<?php

namespace fixtures\Infrastructure\Fakes;

use Agares\AxeOrchestra\Domain\VirtualDiskInterface;
use Agares\AxeOrchestra\Infrastructure\Repositories\VirtualDiskRepositoryInterface;
use Agares\AxeOrchestra\Infrastructure\UUID;

final class FakeVirtualDiskRepository implements VirtualDiskRepositoryInterface
{
	/**
	 * @var VirtualDiskInterface[]
	 */
	public $disks = [];

	public function findByIds(array $ids) : array {
		$disks = [];

		foreach($this->disks as $disk) {
			if(in_array($disk->id(), $ids)) {
				$disks[] = $disk;
			}
		}

		return $disks;
	}
}