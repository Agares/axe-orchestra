<?php

namespace Agares\AxeOrchestra\Infrastructure\CommandHandlers;

use Agares\AxeOrchestra\Domain\Commands\CreateVirtualMachine;
use Agares\AxeOrchestra\Domain\MacAddress;
use Agares\AxeOrchestra\Domain\VirtualMachine;
use Agares\AxeOrchestra\Infrastructure\CommandHandlerInterface;
use Agares\AxeOrchestra\Infrastructure\CommandInterface;
use Agares\AxeOrchestra\Infrastructure\Repositories\TemplateRepositoryInterface;
use Agares\AxeOrchestra\Infrastructure\Repositories\VirtualDiskRepositoryInterface;
use Agares\AxeOrchestra\Infrastructure\Repositories\VirtualMachineRepositoryInterface;
use Agares\AxeOrchestra\Infrastructure\Repositories\VirtualNetworkInterfaceRepositoryInterface;
use Agares\AxeOrchestra\Infrastructure\UUID;

final class CreateVirtualMachineHandler implements CommandHandlerInterface
{
	/**
	 * @var VirtualMachineRepositoryInterface
	 */
	private $machineRepository;

	/**
	 * @var VirtualNetworkInterfaceRepositoryInterface
	 */
	private $virtualNetworkInterfaceRepository;

	/**
	 * @var VirtualDiskRepositoryInterface
	 */
	private $virtualDiskRepository;

	/**
	 * @var TemplateRepositoryInterface
	 */
	private $templateRepository;

	public function __construct(
		VirtualMachineRepositoryInterface $machineRepository,
		VirtualNetworkInterfaceRepositoryInterface $virtualNetworkInterfaceRepository,
		VirtualDiskRepositoryInterface $virtualDiskRepository,
		TemplateRepositoryInterface $templateRepository
	) {
		$this->machineRepository = $machineRepository;
		$this->virtualNetworkInterfaceRepository = $virtualNetworkInterfaceRepository;
		$this->virtualDiskRepository = $virtualDiskRepository;
		$this->templateRepository = $templateRepository;
	}

	public function execute(CommandInterface $command) : UUID {
		/** @var CreateVirtualMachine $command */
		$id                 = UUID::generateRandom();
		$networkInterfaces  = $this->virtualNetworkInterfaceRepository->findByMacs($command->networkInterfaces());
		$disks              = $this->virtualDiskRepository->findByIds($command->disks());
		$template           = $this->templateRepository->findById($command->template());

		$machine = new VirtualMachine(
			$id,
			$command->hostname(),
			$disks,
			$networkInterfaces,
			$template
		);

		$this->machineRepository->create($machine);

		return $id;
	}

	public function canHandle(CommandInterface $command) : bool {
		return $command instanceof CreateVirtualMachine;
	}
}