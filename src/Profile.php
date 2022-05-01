<?php

namespace Produpress\Actito;

class Profile
{
    private Client $client;
    public string $entity;
    public string $table;
    public ?int $profileId;

    public function __construct(Client $client, string $entity, string $table, int $profileId = null)
    {
        $this->profileId = $profileId;
        $this->entity = $entity;
        $this->table = $table;
        $this->client = $client;
    }

    /**
     * Show a profile
     *
     * @param int $profileId
     * @return array|null
     */
    public function show(): array | null
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table . '/profile/' . $this->profileId;
        $response = $this->client->get($url);

        return $response->json();
    }

    /**
     * Update or create a profile
     *
     * @param array $profile
     * @return int|null
     */
    public function store(array $profile): int | null
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table . '/profile';
        $response = $this->client->post($url, $profile);

        return $response->json('profileId');
    }

    /**
     * Delete a profile
     *
     * @return bool
     */
    public function delete(): bool
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table
            . '/profile/' . $this->profileId;
        $response = $this->client->delete($url);

        return $response->successful();
    }

    /**
     * Get list of subscription for a profile
     *
     * @return array|null
     */
    public function subscriptions(): array | null
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table
            . '/profile/' . $this->profileId . '/subscription';
        $response = $this->client->get($url);

        return $response->json('subscriptions');
    }

    /**
     * Add a subscription to a profile
     *
     * @param string $subscriptionName
     * @return bool
     */
    public function subscribe(string $subscriptionName): bool
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table
            . '/profile/' . $this->profileId . '/subscription/' . $subscriptionName;
        $response = $this->client->post($url);

        return $response->successful();
    }

    /**
     * Remove a subscription from a profile
     *
     * @param string $subscriptionName
     * @return bool
     */
    public function unsubscribe(string $subscriptionName): bool
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table
            . '/profile/' . $this->profileId . '/subscription/' . $subscriptionName;
        $response = $this->client->delete($url);

        return $response->successful();
    }

    /**
     * Get list of segmentations for a profile
     *
     * @return array|null
     */
    public function segmentations(): array | null
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table
            . '/profile/' . $this->profileId . '/segmentation';
        $response = $this->client->get($url);

        return $response->json('segmentation');
    }

    /**
     * Add a segmentation to a profile
     *
     * @param string $subscriptionName
     * @return bool
     */
    public function segment(string $segmentationName): bool
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table
            . '/profile/' . $this->profileId . '/segmentation/' . $segmentationName;
        $response = $this->client->put($url);

        return $response->successful();
    }

    /**
     * Remove a segmentation from a profile
     * (I know. "to unsegment" in not a real verb)
     *
     * @param string $segmentationName
     * @return bool
     */
    public function unsegment(string $segmentationName): bool
    {
        $url = '/entity/' . $this->entity . '/table/' . $this->table .
            '/profile/' . $this->profileId . '/segmentation/' . $segmentationName;
        $response = $this->client->delete($url);

        return $response->successful();
    }
}
