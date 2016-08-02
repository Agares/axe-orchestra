<?php

namespace Agares\AxeOrchestra\Infrastructure\Repositories;

use Agares\AxeOrchestra\Domain\VirtualDiskInterface;
use Agares\AxeOrchestra\Infrastructure\UUID;

interface VirtualDiskRepositoryInterface
{
	/**
	 * @param UUID[] $ids
	 *
	 * @return VirtualDiskInterface[]
	 */
	public function findByIds(array $ids) : array;
}