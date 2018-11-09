<?php declare(strict_types = 1);

use Nette\Configurator;

$configurator = new Configurator();
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->addConfig(__DIR__ . '/config.neon');

return $configurator->createContainer();
