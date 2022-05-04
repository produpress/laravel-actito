<?php

namespace Produpress\Actito;

/**
 * Interface for Actito DATA API V4 Profile
 *
 * @link https://developers.actito.com/api-reference/data-v4/#tag/Custom-Table-Records
 *
 * @todo Add list of records method
 * @todo Add update a record method
 *
 * @package Produpress\Actito
 */
class CustomTable
{
    use ActitoTrait;

    public string $customTableId;

    /**
     *
     * @param string $customTableId
     * @return void
     */
    public function __construct(string $customTableId)
    {
        $this->settings();
        $this->customTableId = $customTableId;
    }

    /**
     * Show a record
     *
     * @link https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-get-one
     *
     * @param string $recordId
     * @return array|null profile data or null if not found
     */
    public function get(string $recordId): array | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/customTable/' . $this->customTableId
            . '/record/' . $recordId;
        $response = $this->client->get($url);

        return $response->json();
    }

    /**
     * Update or create a record
     *
     * @link https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-createorupdate
     *
     * @param array $record record data
     * @return int|null record id or null
     */
    public function save(array $record): int | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/customTable/' . $this->customTableId
            . '/record';
        $response = $this->client->post($url, $record);

        return $response->json('businessKey');
    }

    /**
     * Delete a record
     *
     * @link https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-delete-one
     *
     * @return bool
     */
    public function delete(string $recordId): bool
    {
        $url = 'v4/entity/' . $this->entity
            . '/customTable/' . $this->customTableId
            . '/record/' . $recordId;
        $response = $this->client->delete($url);

        return $response->successful();
    }
}
