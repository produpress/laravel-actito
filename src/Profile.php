<?php

namespace Produpress\Actito;

class Profile
{
    use ActitoTrait;

    public ?int $profileId;

    public function __construct(int $profileId = null)
    {
        $this->settings();
        $this->profileId = $profileId;
    }

    /**
     * Show a profile
     *
     * @return array|null profile data or null if not found
     */
    public function get(): array | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile/' . $this->profileId;
        $response = $this->client->get($url);

        return $response->json();
    }

    /**
     * Update or create a profile
     *
     * @param array $profile profile data
     * @return int|null profile id or null
     */
    public function save(array $profile): int | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile';
        $response = $this->client->post($url, $profile);
        $this->profileId = $response->json('profileId');

        return $this->profileId;
    }

    /**
     * Delete a profile
     *
     * @return bool
     */
    public function delete(): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
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
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile/' . $this->profileId
            . '/subscription';
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
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile/' . $this->profileId
            . '/subscription/' . $subscriptionName;
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
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile/' . $this->profileId
            . '/subscription/' . $subscriptionName;
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
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile/' . $this->profileId
            . '/segmentation';
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
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile/' . $this->profileId
            . '/segmentation/' . $segmentationName;
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
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->table
            . '/profile/' . $this->profileId
            . '/segmentation/' . $segmentationName;
        $response = $this->client->delete($url);

        return $response->successful();
    }
}
