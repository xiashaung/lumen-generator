<?php

namespace Xiashaung\LumenGenerator;

/**
 * Interface RenderableInterface
 * @package Xiashaung\LumenGenerator
 */
interface RenderableInterface
{
    /**
     * @param int $indent
     * @param string $delimiter
     * @return string
     */
    public function render($indent = 0, $delimiter = PHP_EOL);
}
