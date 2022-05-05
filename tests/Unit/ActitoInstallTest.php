<?php


it('has console command install', function () {
    $this->artisan('actito:install')
    ->expectsQuestion('Config file already exists. Do you want to overwrite it?', true)
    ->assertExitCode(0);
});

it('has console command install not overwrite', function () {
    $this->artisan('actito:install')
    ->expectsQuestion('Config file already exists. Do you want to overwrite it?', false)
    ->assertExitCode(0);
});
