<?php

namespace LaravelFlare\Versioning;

use Laravelflare\Versioning\Version;

class VersionRepository
{
    /**
     * Query Builder for Version Model
     * 
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $version;

    public function __construct(Version $version)
    {
        $this->version = $version->newQuery();
    }

    public function find($id)
    {
        return $this->version->find($id);
    }

    public function findByHash($hash)
    {   return $this->version->whereHash($hash)->first();

    }

    public function get($id, $type)
    {
        return $this->version->whereModelId($id)->whereModelType($type)->all();
    }

    public function getByModelInstance($instance)
    {
        return $this->version->whereModelId($instance->id)->whereModelType(get_class($instance))->all();
    }

    public function all()
    {
        return $this->version->all();
    }

    public function create($object)
    {
        $newVersion = $this->version->newInstance(['hash' => sha1(time() . serialize($object)), 'object' => $object]);

        $object->versions()->associate($newVersion);

        return $newVersion;
    }

    public function delete($id)
    {
        return $this->version->destroy($id);
    }

    public function deleteByHash($hash)
    {
        return $this->version->findByHash($hash)->delete();
    }
 
}