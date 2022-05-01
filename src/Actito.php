<?php

namespace Produpress\Actito;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Actito
{
    public string $entity;
    public string $table;
    public $client;


    /**
     * Actito
     *
     * @param string $uri
     * @param string $entity
     * @param string $table
     * @param string $key
     * @return void
     */
    public function __construct(string $uri, string $entity, string $table, string $key)
    {
        $this->client =  new Client($uri, $key);
        $this->entity = $entity;
        $this->table = $table;
    }

    /**
     *
     * @param int|null $profileId
     * @return Profile
     */
    public function profile(int $profileId = null)
    {
        $profile = new Profile($this->client, $this->entity, $this->table, $profileId);
        return $profile;
    }

    /**
     * Set entity
     *
     * @param string $entity
     * @return $this
     */
    public function entity(string $entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * Set table
     *
     * @param string $table
     * @return $this
     */
    public function table(string $table)
    {
        $this->table = $table;
        return $this;
    }
}
