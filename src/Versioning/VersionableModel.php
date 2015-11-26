<?php

namespace LaravelFlare\Versioning;

trait VersionableModel
{
    /**
     * Morph Versions to Model.
     * 
     * @return 
     */
    public function versions()
    {
        return $this->morphMany(\LaravelFlare\Versioning\Version::class, 'model');
    }

    /**
     * Revert to the previous version of the Model.
     *
     * This is the most recent version in the flare_versions 
     * table for this model instance (based on model_id
     * and model_type).
     * 
     * @return
     */
    public function revert()
    {

    }

    /**
     * Revert to a specified version of the Model.
     *
     * @return
     */
    public function revertTo($hash)
    {

    }
}
