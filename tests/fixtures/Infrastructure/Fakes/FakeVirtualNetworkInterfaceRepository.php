<?php

namespace fixtures\Infrastructure\Fakes;

use Agares\AxeOrchestra\Domain\MacAddress;
use Agares\AxeOrchestra\Domain\VirtualNetworkInterface;
use Agares\AxeOrchestra\Infrastructure\Repositories\VirtualNetworkInterfaceRepositoryInterface;

final class FakeVirtualNetworkInterfaceRepository implements VirtualNetworkInterfaceRepositoryInterface
{
	/**
	 * @var VirtualNetworkInterface[]
	 */
	public $interfaces = [];

	public function findByMacs(array $macAddresses) : array {
		$interfaces = [];

		foreach($this->interfaces as $interface) {
			if(in_array($interface->macAddress(), $macAddresses)) {
				$interfaces[]  = $interface;
			}
		}

		return $interfaces;
	}
}