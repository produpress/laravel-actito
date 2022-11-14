<?php

namespace Produpress\Actito;

/**
 * Interface for Actito DataModel API Custom Table
 *
 * @link https://developers.actito.com/api-reference/data-v4/#tag/Custom-Table-Records
 *
 * @package Produpress\Actito
 */
class CustomTable
{
    use ActitoTrait;

    public ?string $customTableId;

    /**
     *
     * @param string $customTableId
     * @return void
     */
    public function __construct(string $customTableId = null)
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
     * Search records
     *
     * @link https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-get-list
     *
     * @param string $searchField Search field
     * @param string $searchValue Search value
     * @return array Array of custom table secords
     */
    public function search(string $searchField, string $searchValue): array
    {
        $url = 'v4/entity/' . $this->entity
            . '/customTable/' . $this->customTableId
            . '/record?searchField=' . $searchField . '&searchValue=' . $searchValue;
        $response = $this->client->get($url);

        return $response->json();
    }

    /**
     * Update or create a record
     *
     * @link https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-createorupdate
     *
     * @param array $record record data
     * @return string|array|null record id or null
     */
    public function save(array $record): string | array | null
    {
        $url = 'v4/entity/' . $this->entity
            . '/customTable/' . $this->customTableId
            . '/record';
        $response = $this->client->post($url, $record);
        if ($response->successful()) {
            return $response->json('businessKey');
        }
        return $response->json();
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

    /**
     * DataModel V5
     */

    /**
     * List custom tables
     *
     * @link https://developers.actito.com/api-reference/datamodel-v5/#operation/customtables-get-list
     *
     * @return array|null list of custom tables
     */
    public function tables(): array | null
    {
        $url = 'v5/entities/' . $this->entity . '/custom-tables';
        $response = $this->client->get($url);

        return $response->json();
    }

    /**
     * Get a custom table schema
     *
     * @link https://developers.actito.com/api-reference/datamodel-v5/#operation/customtables-get-one
     *
     * @return array|null custom table schema
     */
    public function schema(): array | null
    {
        $url = 'v5/entities/' . $this->entity . '/custom-tables/' . $this->customTableId;
        $response = $this->client->get($url);

        return $response->json();
    }

    /**
     * Get a custom table schema
     *
     * @link https://developers.actito.com/api-reference/datamodel-v5/#operation/customtables-get-one
     *
     * @return array|null custom table schema
     */
    public function change(array $request): array | null
    {
        $url = 'v5/entities/' . $this->entity . '/custom-tables/' . $this->customTableId . '/change-requests';
        $response = $this->client->post($url, $request);

        return $response->json();
    }

    /**
     * Create a custom table
     *
     * @link https://developers.actito.com/api-reference/datamodel-v5#operation/customtables-create
     *
     * @return array|null custom table schema
     */
    public function create(array $stucture): array | null
    {
        $url = 'v5/entities/' . $this->entity . '/custom-tables';
        $response = $this->client->post($url, $stucture);
        return $response->json();
    }
}
