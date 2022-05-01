<?php

namespace Produpress\Actito;

class Attributes
{
    public array $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function make()
    {
        $data = [];
        foreach ($this->attributes as $key => $value) {
            $data[] = ['name' => $key, 'value' => $value];
        }

        return $data;
    }

    public static function get($attributes)
    {
        $data = new self($attributes);

        return $data->make();
    }
}
