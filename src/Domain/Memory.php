<?php
namespace Agares\AxeOrchestra\Domain;

use Agares\AxeOrchestra\Domain\Exceptions\InvalidMemoryAmountException;

final class Memory
{
	/**
	 * @var int
	 */
	private $megabytes;

	private function __construct(int $megabytes) {
		$this->megabytes = $megabytes;
	}

	public static function fromMegaBytes(int $megabytes) : self {
		static::validate($megabytes);

		return new Memory($megabytes);
	}

	private static function validate(int $megabytes)
	{
		if($megabytes <= 0)
			throw InvalidMemoryAmountException::amount($megabytes);
	}

	public function megabytes() : int {
		return $this->megabytes;
	}
}