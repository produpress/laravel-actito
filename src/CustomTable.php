<?php

namespace Produpress\Actito;

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
