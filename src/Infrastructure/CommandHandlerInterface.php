<?php

namespace Agares\AxeOrchestra\Infrastructure;

interface CommandHandlerInterface
{
	public function execute(CommandInterface $command) : UUID;
	public function canHandle(CommandInterface $command) : bool;
}