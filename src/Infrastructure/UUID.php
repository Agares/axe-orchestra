<?php

namespace Agares\AxeOrchestra\Infrastructure;

final class UUID
{
	/**
	 * @var string
	 */
	private $value;

	private function __construct(string $value) {
		$this->value = $value;
	}

	public static function generateRandom() : self {
		return new UUID(\Ramsey\Uuid\Uuid::uuid4());
	}

	public function __toString() {
		return $this->value;
	}
}