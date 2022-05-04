<?php

namespace Produpress\Actito;

class Profile
{
    use ActitoTrait;

    public ?string $tableId;

    public function __construct(string $tableId = null)
    {
        $this->settings();
        $this->tableId = $tableId ?? config('actito_table');
    }

    /**
     * Show a profile
     *
     * @param int $profileId Profile Id
     * @return array|null profile data or null if not found
     */
    public function get(int $profileId): array | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId;
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
            . '/table/' . $this->tableId
            . '/profile';
        $response = $this->client->post($url, $profile);
        $profileId = $response->json('profileId');

        return $profileId;
    }

    /**
     * Delete a profile
     *
     * @param int $profileId Profile Id
     * @return bool
     */
    public function delete(int $profileId): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId;
        $response = $this->client->delete($url);

        return $response->successful();
    }

    /**
     * Get list of subscription for a profile
     *
     * @return array|null
     */
    public function subscriptions(int $profileId): array | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/subscription';
        $response = $this->client->get($url);

        return $response->json('subscriptions');
    }

    /**
     * Add a subscription to a profile
     *
     * @param int $profileId Profile Id
     * @param string $subscriptionName
     * @return bool
     */
    public function subscribe(int $profileId, string $subscriptionName): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/subscription/' . $subscriptionName;
        $response = $this->client->post($url);

        return $response->successful();
    }

    /**
     * Remove a subscription from a profile
     *
     * @param int $profileId Profile Id
     * @param string $subscriptionName
     * @return bool
     */
    public function unsubscribe(int $profileId, string $subscriptionName): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/subscription/' . $subscriptionName;
        $response = $this->client->delete($url);

        return $response->successful();
    }

    /**
     * Get list of segmentations for a profile
     *
     * @param int $profileId Profile Id
     * @return array|null
     */
    public function segmentations(int $profileId): array | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/segmentation';
        $response = $this->client->get($url);

        return $response->json('segmentation');
    }

    /**
     * Add a segmentation to a profile
     *
     * @param int $profileId Profile Id
     * @param string $subscriptionName
     * @return bool
     */
    public function segment(int $profileId,string $segmentationName): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/segmentation/' . $segmentationName;
        $response = $this->client->put($url);

        return $response->successful();
    }

    /**
     * Remove a segmentation from a profile
     * (I know. "to unsegment" in not a real verb)
     *
     * @param int $profileId Profile Id
     * @param string $segmentationName
     * @return bool
     */
    public function unsegment(int $profileId,string $segmentationName): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/segmentation/' . $segmentationName;
        $response = $this->client->delete($url);

        return $response->successful();
    }
}
