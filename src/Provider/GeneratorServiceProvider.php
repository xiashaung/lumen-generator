<?php

namespace Xiashaung\LumenGenerator\Provider;

use Illuminate\Support\ServiceProvider;
use Xiashaung\LumenGenerator\Command\GenerateLumenModelCommand;
use Xiashaung\LumenGenerator\Command\GenerateLumenModelsCommand;
use Xiashaung\LumenGenerator\Command\GenerateLumenSwaggerInfoCommand;

/**
 * Class GeneratorServiceProvider
 * @package Xiashaung\LumenGenerator\Provider
 */
class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->commands([
            GenerateLumenModelCommand::class,
            GenerateLumenModelsCommand::class,
            GenerateLumenSwaggerInfoCommand::class,
        ]);

    }
}
