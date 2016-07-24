<?php

namespace Agares\AxeOrchestra\Domain;

interface VirtualNetworkInterface
{
	public function macAddress() : MacAddress;
}