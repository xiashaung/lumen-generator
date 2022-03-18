<?php
/**
 * @file
 * Contains \Xiashaung\LumenGenerator\Model\MicroServiceExtendModel.
 */

namespace Xiashaung\LumenGenerator\Model;

use DateTimeInterface;
use Xiashaung\MicroServiceModelUtils\Models\MicroServiceBaseModel;

/**
 * A base model class that can be used in a microservice.
 *
 * @package Xiashaung\MicroServiceModelUtils\Models\MicroServiceBaseModel
 */
abstract class MicroServiceExtendModel extends MicroServiceBaseModel
{

    /**
     * Get the value of the primary key, used to identify this model.
     *
     * @return mixed
     */
    public function getPrimaryKeyValue()
    {
        return $this[$this->primaryKey];
    }

    public function getDates()
    {
        return $this->dates;
    }

    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
