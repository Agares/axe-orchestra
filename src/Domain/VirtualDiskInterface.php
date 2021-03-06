<?php

namespace Agares\AxeOrchestra\Domain;

use Agares\AxeOrchestra\Infrastructure\UUID;

interface VirtualDiskInterface
{
	public function id() : UUID;
	public function virtualDeviceName() : string;
	public function writable() : bool;
}