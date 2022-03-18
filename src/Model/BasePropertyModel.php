<?php

namespace Xiashaung\LumenGenerator\Model;

use Xiashaung\LumenGenerator\RenderableModel;

/**
 * Class BaseProperty
 * @package Xiashaung\LumenGenerator\Model
 */
abstract class BasePropertyModel extends RenderableModel
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
