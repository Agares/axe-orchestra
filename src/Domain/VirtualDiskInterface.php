<?php

namespace Agares\AxeOrchestra\Domain;

interface VirtualDiskInterface
{
	public function virtualDeviceName() : string;
	public function writable() : bool;
}