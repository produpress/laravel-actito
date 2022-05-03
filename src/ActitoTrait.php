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
        $this->table = config('actito.table');
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
