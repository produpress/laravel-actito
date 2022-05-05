<?php

use Illuminate\Support\Facades\Http;
use Produpress\Actito\Facades\Actito;

it('is CustomTable', function () {
    $table = Actito::customTable('test');
    $this->assertInstanceOf(Produpress\Actito\CustomTable::class, $table);
});

it('has entity', function () {
    $x = rand();
    $profile = Actito::customTable('test')->entity($x);
    $this->assertEquals($x, $profile->entity);
});

it('gets a record', function () {
    $data = [
        'custom' => rand(),
    ];
    Http::fake([
        'https://test.example.net/*' => Http::response($data, 200, ['Headers']),
    ]);
    $record = Actito::customTable('test')->get(1);
    $this->assertEquals($record, $data);
});

it('deletes a record', function () {
    Http::fake([
        'https://test.example.net/*' => Http::response(true, 200, ['Headers']),
    ]);
    $record = Actito::customTable('test')->delete(1);
    $this->assertTrue($record);
});

it('creates a record', function () {
    $data = [
        'businessKey' => rand(),
    ];
    Http::fake([
        'https://test.example.net/*' => Http::response($data, 200, ['Headers']),
    ]);
    $record = Actito::customTable('test')->save($data);
    $this->assertEquals($record, $data['businessKey']);
});
