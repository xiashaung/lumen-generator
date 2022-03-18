<?php

namespace Xiashaung\LumenGenerator\Model\Traits;

use Xiashaung\LumenGenerator\Model\DocBlockModel;

/**
 * Trait DocBlockTrait
 * @package Xiashaung\LumenGenerator\Model\Traits
 */
trait DocBlockTrait
{
    /**
     * @var DocBlockModel
     */
    protected $docBlock;

    /**
     * @return DocBlockModel
     */
    public function getDocBlock()
    {
        return $this->docBlock;
    }

    /**
     * @param DocBlockModel $docBlock
     *
     * @return $this
     */
    public function setDocBlock($docBlock)
    {
        $this->docBlock = $docBlock;

        return $this;
    }
}
