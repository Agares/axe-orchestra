<?php

namespace Agares\AxeOrchestra\Infrastructure\Repositories;

use Agares\AxeOrchestra\Domain\TemplateInterface;
use Agares\AxeOrchestra\Infrastructure\UUID;

interface TemplateRepositoryInterface
{
	public function findById(UUID $id) : TemplateInterface;
}