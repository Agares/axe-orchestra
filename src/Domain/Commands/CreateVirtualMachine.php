<?php

namespace Agares\AxeOrchestra\Domain\Commands;

use Agares\AxeOrchestra\Domain\Hostname;
use Agares\AxeOrchestra\Domain\MacAddress;
use Agares\AxeOrchestra\Infrastructure\CommandInterface;
use Agares\AxeOrchestra\Infrastructure\UUID;

final class CreateVirtualMachine implements CommandInterface
{
	/**
	 * @var Hostname
	 */
	private $hostname;

	/**
	 * @var MacAddress[]
	 */
	private $networkInterfaces;

	/**
	 * @var UUID[]|array
	 */
	private $disks;

	/**
	 * @var UUID
	 */
	private $template;

	/**
	 * @param Hostname $hostname
	 * @param MacAddress[] $networkInterfaces
	 * @param UUID[] $disks
	 * @param UUID $template
	 */
	public function __construct(Hostname $hostname, array $networkInterfaces, array $disks, UUID $template) {
		$this->hostname = $hostname;
		$this->networkInterfaces = $networkInterfaces;
		$this->disks = $disks;
		$this->template = $template;
	}

	public function hostname() : Hostname {
		return $this->hostname;
	}
	/**
	 * @return MacAddress[]
	 */
	public function networkInterfaces() : array {
		return $this->networkInterfaces;
	}
	/**
	 * @return UUID[]
	 */
	public function disks() : array {
		return $this->disks;
	}

	public function template() : UUID {
		return $this->template;
	}
}