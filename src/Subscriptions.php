<?php

namespace Produpress\Actito;

class Subscriptions
{
    public array $subscriptions;

    public function __construct(array $subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    public function make()
    {
        $data = [];
        foreach ($this->subscriptions as $key => $value) {
            $data[] = ['name' => $key, 'subscribe' => $value];
        }

        return $data;
    }

    public static function get($subscriptions)
    {
        $data = new self($subscriptions);

        return $data->make();
    }
}
