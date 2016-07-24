<?php

namespace Agares\AxeOrchestra\Domain;

final class VirtualMachine
{
	/**
	 * @var Hostname
	 */
	private $hostname;

	/**
	 * @var VirtualDiskInterface[]
	 */
	private $disks;

	/**
	 * @var VirtualNetworkInterface[]
	 */
	private $networkInterfaces;

	/**
	 * @param Hostname $hostname
	 * @param VirtualDiskInterface[] $disks
	 * @param VirtualNetworkInterface[] $networkInterfaces
	 */
	public function __construct(Hostname $hostname, array $disks, array $networkInterfaces) {
		$this->hostname = $hostname;
		$this->disks = $disks;
		$this->networkInterfaces = $networkInterfaces;
	}
}