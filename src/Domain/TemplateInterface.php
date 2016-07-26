<?php

namespace Agares\AxeOrchestra\Domain;

use Agares\AxeOrchestra\Infrastructure\UUID;

interface TemplateInterface
{
	public function id() : UUID;
}