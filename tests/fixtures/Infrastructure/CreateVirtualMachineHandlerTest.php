<?php

namespace fixtures\Infrastructure;

use Agares\AxeOrchestra\Domain\BridgedNetworkInterface;
use Agares\AxeOrchestra\Domain\CdRom;
use Agares\AxeOrchestra\Domain\Commands\CreateVirtualMachine;
use Agares\AxeOrchestra\Domain\Hostname;
use Agares\AxeOrchestra\Domain\MacAddress;
use Agares\AxeOrchestra\Infrastructure\CommandHandlers\CreateVirtualMachineHandler;
use Agares\AxeOrchestra\Infrastructure\UUID;
use fixtures\Infrastructure\Fakes\FakeTemplate;
use fixtures\Infrastructure\Fakes\FakeTemplateRepository;
use fixtures\Infrastructure\Fakes\FakeVirtualDiskRepository;
use fixtures\Infrastructure\Fakes\FakeVirtualMachineRepository;
use fixtures\Infrastructure\Fakes\FakeVirtualNetworkInterfaceRepository;

class CreateVirtualMachineHandlerTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var FakeVirtualMachineRepository
	 */
	private $machineRepository;

	/**
	 * @var FakeVirtualNetworkInterfaceRepository
	 */
	private $virtualNetworkInterfaceRepository;

	/**
	 * @var FakeVirtualDiskRepository
	 */
	private $virtualDiskRepository;

	/**
	 * @var FakeTemplateRepository
	 */
	private $templateRepository;

	/**
	 * @var CreateVirtualMachineHandler
	 */
	private $handler;

	public function setUp() {
		$this->machineRepository = new FakeVirtualMachineRepository();
		$this->virtualNetworkInterfaceRepository = new FakeVirtualNetworkInterfaceRepository();
		$this->virtualDiskRepository = new FakeVirtualDiskRepository();
		$this->templateRepository = new FakeTemplateRepository();

		$template = new FakeTemplate(UUID::generateRandom());
		$this->templateRepository->templates[] = $template;

		$this->handler = new CreateVirtualMachineHandler(
			$this->machineRepository,
			$this->virtualNetworkInterfaceRepository,
			$this->virtualDiskRepository,
			$this->templateRepository
		);
	}

	public function testCanHandleTheCommand() {
		$command = new CreateVirtualMachine(Hostname::fromString('castiel'), [], [], $this->templateRepository->templates[0]->id());

		$this->assertTrue($this->handler->canHandle($command));
	}

	public function testPersistsTheVM() {
		$command = new CreateVirtualMachine(Hostname::fromString('lucifer'), [], [], $this->templateRepository->templates[0]->id());

		$this->handler->execute($command);

		$this->assertEquals(1, count($this->machineRepository->machines));
	}

	public function testTheVMHasValidNetworkInterfaces() {
		$macAddress = MacAddress::fromString('00:11:22:33:44:55');
		$networkInterface = new BridgedNetworkInterface($macAddress);
		$this->virtualNetworkInterfaceRepository->interfaces[] = $networkInterface;

		$command = new CreateVirtualMachine(Hostname::fromString('sam'), [$macAddress], [], $this->templateRepository->templates[0]->id());

		$this->handler->execute($command);

		$this->assertEquals([$networkInterface], $this->machineRepository->machines[0]->networkInterfaces());
	}

	public function testTheVMHasValidDisk() {
		$disk = new CdRom(UUID::generateRandom(), 'xvda', '/home/xen/test.iso');

		$this->virtualDiskRepository->disks[] = $disk;

		$command = new CreateVirtualMachine(Hostname::fromString('rowena'), [], [$disk->id()], $this->templateRepository->templates[0]->id());

		$this->handler->execute($command);

		$this->assertEquals([$disk], $this->machineRepository->machines[0]->disks());
	}

	public function testTheVMHasValidTemplate() {

		$command = new CreateVirtualMachine(Hostname::fromString('metatron'), [], [], $this->templateRepository->templates[0]->id());

		$this->handler->execute($command);

		$this->assertEquals($this->templateRepository->templates[0], $this->machineRepository->machines[0]->template());
	}
}
