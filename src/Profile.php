<?php

namespace Produpress\Actito;

/**
 * Interface for Actito Data API Profile
 *
 * @link https://developers.actito.com/api-reference/data-v4/#tag/Profiles
 *
 * @package Produpress\Actito
 */
class Profile
{
    use ActitoTrait;

    public ?string $tableId;

    public function __construct(string $tableId = null)
    {
        $this->settings();
        $this->tableId = $tableId ?? config('actito.table');
    }

    /**
     * Show a profile
     *
     * @link https://developers.actito.com/api-reference/data-v4#operation/profiles-get-one
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
     * Search a profile
     *
     * @link https://developers.actito.com/api-reference/data-v4#operation/profiles-get-one
     *
     * @param string $searchField Search field
     * @param string $searchValue Search value
     * @return array|null profile data or null if not found
     */
    public function search(string $searchField, string $searchValue): array | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $searchField . '=' . $searchValue;
        $response = $this->client->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    /**
     * Update or create a profile
     *
     * @link https://developers.actito.com/api-reference/data-v4#operation/profiles-update-one
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
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-delete-one
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
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-get-all
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
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-add
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
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-delete-one
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
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-segmentations-get-all
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
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-segmentations-createorupdate
     *
     * @param int $profileId Profile Id
     * @param string $segmentationName
     * @return bool
     */
    public function segment(int $profileId, string $segmentationName, string $category = null): bool
    {
        $data = (! is_null($category) ? ';category=' . $category : '');
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/segmentation/' . $segmentationName . $data;
        $response = $this->client->put($url);


        ray($response->body());

        return $response->successful();
    }

    /**
     * Remove a segmentation from a profile
     * (I know. "to unsegment" in not a real verb)
     *
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-segmentations-delete-one
     *
     * @param int $profileId Profile Id
     * @param string $segmentationName
     * @return bool
     */
    public function unsegment(int $profileId, string $segmentationName): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/table/' . $this->tableId
            . '/profile/' . $profileId
            . '/segmentation/' . $segmentationName;
        $response = $this->client->delete($url);

        return $response->successful();
    }

    /**
     * DataModel V5
     */

    /**
     * List of profile tables
     *
     * @link https://developers.actito.com/api-reference/datamodel-v5/#operation/profiletables-get-list
     *
     * @return array|null list of custom tables
     */
    public function tables(): array | null
    {
        $url = 'v5/entities/' . $this->entity . '/profile-tables';
        $response = $this->client->get($url);

        return $response->json();
    }

    /**
     * Get a profile table schema
     *
     * @link https://developers.actito.com/api-reference/datamodel-v5/#operation/profiletables-get-one
     *
     * @return array|null custom table schema
     */
    public function schema(): array | null
    {
        $url = 'v5/entities/' . $this->entity . '/profile-tables/' . $this->tableId;
        $response = $this->client->get($url);

        return $response->json();
    }
}
