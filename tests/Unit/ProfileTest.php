<?php

use Illuminate\Support\Facades\Http;
use Produpress\Actito\Facades\Actito;

it('is Profile', function () {
    $profile = Actito::profile();
    $this->assertInstanceOf(Produpress\Actito\Profile::class, $profile);
});

it('has entity', function () {
    $x = rand();
    $profile = Actito::profile()->entity($x);
    $this->assertEquals($x, $profile->entity);
});

it('gets profile data', function () {
    $data = [
        'profileId' => rand(),
    ];
    Http::fake([
        'https://test.example.net/*' => Http::response($data, 200, ['Headers']),
    ]);
    $profile = Actito::profile()->get(1);
    $this->assertEquals($profile, $data);
});

it('deletes a profile', function () {
    Http::fake([
        'https://test.example.net/*' => Http::response(true, 200, ['Headers']),
    ]);
    $profile = Actito::profile()->delete(1);
    $this->assertTrue($profile);
});

it('creates a profile', function () {
    $data = [
        'profileId' => rand(),
    ];
    Http::fake([
        'https://test.example.net/*' => Http::response($data, 200, ['Headers']),
    ]);
    $profileId = Actito::profile()->save($data);
    $this->assertEquals($profileId, $data['profileId']);
});

it('list subscriptions of a profile', function () {
    $data = [
        'subscriptions' => [
            'testNewsletter' => true,
            'testAlert' => false,
        ],
    ];
    Http::fake([
        'https://test.example.net/*' => Http::response($data, 200, ['Headers']),
    ]);
    $response = Actito::profile()->subscriptions(1);
    $this->assertEquals($response, $data['subscriptions']);
});

it('subscribes a profile', function () {
    Http::fake([
        'https://test.example.net/*' => Http::response(true, 200, ['Headers']),
    ]);
    $response = Actito::profile()->subscribe(1, 'testNewsletter');
    $this->assertTrue($response);
});

it('unsubscribes a profile', function () {
    Http::fake([
        'https://test.example.net/*' => Http::response(true, 200, ['Headers']),
    ]);
    $response = Actito::profile()->unsubscribe(1, 'testNewsletter');
    $this->assertTrue($response);
});


it('segments a profile', function () {
    Http::fake([
        'https://test.example.net/*' => Http::response(true, 200, ['Headers']),
    ]);
    $response = Actito::profile()->segment(1, 'testSegment');
    $this->assertTrue($response);
});

it('unsegments a profile', function () {
    Http::fake([
        'https://test.example.net/*' => Http::response(true, 200, ['Headers']),
    ]);
    $response = Actito::profile()->unsegment(1, 'testSegment');
    $this->assertTrue($response);
});

it('list segmentations of a profile', function () {
    $data = [
        'segmentation' => [
            'segmentA' => true,
            'segmentB' => false,
        ],
    ];
    Http::fake([
        'https://test.example.net/*' => Http::response($data, 200, ['Headers']),
    ]);
    $response = Actito::profile()->segmentations(1);
    $this->assertEquals($response, $data['segmentation']);
});
