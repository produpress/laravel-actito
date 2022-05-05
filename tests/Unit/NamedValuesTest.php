<?php

use Produpress\Actito\Facades\Actito;

it('has named values converter', function () {
    $result = Actito::namedValues([
        'test' => true,
        'alert' => false,
    ]);
    $this->assertEquals($result,  [
        0 => [
            "name" => "test",
            "value" => true,
        ],
        1 => [
            "name" => "alert",
            "value" => false,
        ],
    ]);
});
