<?php

namespace Agares\AxeOrchestra\Domain\Exceptions;

use Agares\AxeOrchestra\Infrastructure\UUID;

final class TemplateNotFoundException extends \Exception
{
	public static function byId(UUID $id) {
		return new self(sprintf('Cannot find the template with id %s', (string)$id));
	}
}