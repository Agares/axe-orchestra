<?php

namespace fixtures\Infrastructure\Fakes;

use Agares\AxeOrchestra\Domain\VirtualMachine;
use Agares\AxeOrchestra\Infrastructure\Repositories\VirtualMachineRepositoryInterface;

final class FakeVirtualMachineRepository implements VirtualMachineRepositoryInterface
{
	/**
	 * @var VirtualMachine[]
	 */
	public $machines = array();

	public function create(VirtualMachine $machine) {
		$this->machines[] = $machine;
	}
}