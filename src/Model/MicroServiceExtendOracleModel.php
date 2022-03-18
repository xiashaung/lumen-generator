<?php
/**
 * @file
 * Contains \Xiashaung\LumenGenerator\Model\MicroServiceExtendModel.
 */

namespace Xiashaung\LumenGenerator\Model;

use Xiashaung\MicroServiceModelUtils\Models\MicroServiceBaseOracleModel;

/**
 * A base model class that can be used in a microservice.
 *
 * @package Xiashaung\MicroServiceModelUtils\Models\MicroServiceBaseModel
 */
abstract class MicroServiceExtendOracleModel extends MicroServiceBaseOracleModel
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
}
