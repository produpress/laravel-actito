<?php

namespace Produpress\Actito;

/**
 * A trait for Actito classes.
 *
 * @package Produpress\Actito
 */
trait ActitoTrait
{
    public string $entity;
    public Client $client;

    /**
     * Actito settings
     *
     * @return void
     */
    private function settings()
    {
        $this->entity = config('actito.entity');
        $this->client = new Client();
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
}
