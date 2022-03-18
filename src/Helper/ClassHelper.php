<?php

namespace Xiashaung\LumenGenerator\Helper;

/**
 * Class ClassHelper
 * @package Xiashaung\LumenGenerator\Helper
 */
class ClassHelper
{
    /**
     * @param string $fullClassName
     * @return string
     */
    public static function getShortClassName($fullClassName)
    {
        $pieces = explode('\\', $fullClassName);

        return end($pieces);
    }
}
