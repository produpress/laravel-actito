<?php

namespace Produpress\Actito;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Wrapper for the Laravel Http client that adds the Actito token to the request
 *
 * @package Produpress\Actito
 */
class Client
{
    public string $uri;
    private string $key;

    /**
     * Actito Http Client
     *
     * @return void
     */
    public function __construct()
    {
        $this->uri = config('actito.uri');
        $this->key = config('actito.key');
    }

    /**
     * Get token from Actito
     *
     * @return string|null
     */
    private function token(): string | null
    {
        return Cache::remember('actitoToken', 840, function () {
            $response = Http::withHeaders([
                'Authorization' => $this->key,
            ])->get($this->uri . 'auth/token');

            return $response->json('accessToken');
        });
    }

    /**
     * Http get
     *
     * @param string $url
     * @param array $query
     * @return mixed
     */
    public function get(string $url, array $query=null)
    {
        return Http::withToken($this->token())->get($this->uri . $url, $query);
    }

    /**
     * Http post
     *
     * @param string $url
     * @param array $data
     * @return mixed
     */
    public function post(string $url, array $data = null)
    {
        return Http::withToken($this->token())->post($this->uri . $url, $data);
    }

    /**
     * Http put
     *
     * @param string $url
     * @param array $data
     * @return mixed
     */
    public function put(string $url, array $data = null)
    {
        return Http::withToken($this->token())->put($this->uri . $url, $data);
    }

    /**
     * Http delete
     *
     * @param string $url
     * @return mixed
     */
    public function delete(string $url)
    {
        return Http::withToken($this->token())->delete($this->uri . $url);
    }
}
