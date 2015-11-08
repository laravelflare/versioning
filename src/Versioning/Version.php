<?php

namespace LaravelFlare\Versioning;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flare_versions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hash', 'object'];

    /**
     * Get the owning model.
     *
     * @return
     */
    public function model()
    {
        return $this->morphTo();
    }

    /**
     * Gets the Object Attribute, 
     *
     * Base64 decodes an Object and then unserializes it.
     * 
     * @return object
     */
    public function getObjectAttribute()
    {
        if (!$this->object) {
            return;
        }

        return unserialize(base64_decode($this->object));
    }

    /**
     * Sets the Object to the Version Model
     * by first serializing it and then base64 encoding it.
     * 
     * @param object $value
     */
    public function setObjectAttribute($value)
    {
        if (is_object($value)) {
            $this->attributes['object'] = base64_encode(serialize($value));
        }
    }
}
