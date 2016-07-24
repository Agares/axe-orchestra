<?php

namespace Agares\AxeOrchestra\Domain;

final class BridgedNetworkInterface implements VirtualNetworkInterface
{
	/**
	 * @var MacAddress
	 */
	private $macAddress;

	public function __construct(MacAddress $macAddress) {
		$this->macAddress = $macAddress;
	}

	public function macAddress() : MacAddress {
		return $this->macAddress;
	}
}