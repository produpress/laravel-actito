<?php

namespace Produpress\Actito;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Client
{
    public string $uri;
    private string $key;
    private PendingRequest $http;

    /**
     * Actito Http Client
     *
     * @param string $uri
     * @param string $entity
     * @param string $table
     * @param string $key
     * @return void
     */
    public function __construct(string $uri, string $key)
    {
        $this->uri = $uri;
        $this->key = $key;
        $this->http = Http::withToken($this->token());
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
     * @return mixed
     */
    public function get(string $url)
    {
        return $this->http->get($this->uri . 'v4' . $url);
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
        return $this->http->post($this->uri . 'v4' .$url, $data);
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
        return $this->http->put($this->uri . 'v4' .$url, $data);
    }

    /**
     * Http delete
     *
     * @param string $url
     * @return mixed
     */
    public function delete(string $url)
    {
        return $this->http->delete($this->uri . 'v4' .$url);
    }
}
