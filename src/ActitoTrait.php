<?php

namespace Produpress\Actito;

trait ActitoTrait
{
    public string $entity;
    public string $table;
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
