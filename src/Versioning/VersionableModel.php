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
}
