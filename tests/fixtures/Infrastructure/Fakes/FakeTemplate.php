<?php

namespace fixtures\Infrastructure\Fakes;

use Agares\AxeOrchestra\Domain\TemplateInterface;
use Agares\AxeOrchestra\Infrastructure\UUID;

final class FakeTemplate implements TemplateInterface
{
	/**
	 * @var UUID
	 */
	private $id;

	public function __construct(UUID $id) {
		$this->id = $id;
	}

	public function id() : UUID {
		return $this->id;
	}
}