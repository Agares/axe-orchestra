<?php

namespace Agares\AxeOrchestra\Infrastructure\Repositories;

use Agares\AxeOrchestra\Domain\MacAddress;
use Agares\AxeOrchestra\Domain\VirtualNetworkInterface;

interface VirtualNetworkInterfaceRepositoryInterface
{
	/**
	 * @param MacAddress[] $macAddresses
	 *
	 * @return VirtualNetworkInterface[]
	 */
	public function findByMacs(array $macAddresses) : array;
}