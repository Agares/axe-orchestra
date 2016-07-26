<?php

namespace Agares\AxeOrchestra\Domain;

use Agares\AxeOrchestra\Infrastructure\UUID;

final class VirtualMachine
{
	/**
	 * @var UUID
	 */
	private $id;

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
	 * @var TemplateInterface
	 */
	private $template;

	/**
	 * @param UUID $id
	 * @param Hostname $hostname
	 * @param VirtualDiskInterface[] $disks
	 * @param VirtualNetworkInterface[] $networkInterfaces
	 * @param TemplateInterface $template
	 */
	public function __construct(UUID $id, Hostname $hostname, array $disks, array $networkInterfaces, TemplateInterface $template) {
		$this->id = $id;
		$this->hostname = $hostname;
		$this->disks = $disks;
		$this->networkInterfaces = $networkInterfaces;
		$this->template = $template;
	}

	public function networkInterfaces() : array {
		return $this->networkInterfaces;
	}

	public function disks() : array {
		return $this->disks;
	}

	public function template() : TemplateInterface {
		return $this->template;
	}
}