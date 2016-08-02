<?php

namespace Agares\AxeOrchestra\Infrastructure\Repositories;

use Agares\AxeOrchestra\Domain\VirtualMachine;

interface VirtualMachineRepositoryInterface
{
	public function create(VirtualMachine $machine);
}