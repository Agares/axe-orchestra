<?php

namespace fixtures\Infrastructure\Fakes;

use Agares\AxeOrchestra\Domain\Exceptions\TemplateNotFoundException;
use Agares\AxeOrchestra\Domain\TemplateInterface;
use Agares\AxeOrchestra\Infrastructure\Repositories\TemplateRepositoryInterface;
use Agares\AxeOrchestra\Infrastructure\UUID;

final class FakeTemplateRepository implements TemplateRepositoryInterface
{
	/**
	 * @var TemplateInterface[]
	 */
	public $templates = [];

	public function findById(UUID $id) : TemplateInterface {
		foreach($this->templates as $template) {
			if($template->id() == $id) {
				return $template;
			}
		}

		throw TemplateNotFoundException::byId($id);
	}
}