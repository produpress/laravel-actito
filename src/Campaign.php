<?php

namespace Produpress\Actito;

/**
 * Interface for Actito Campaigns
 *
 * @link https://developers.actito.com/api-reference/campaigns-v4
 *
 * @package Produpress\Actito
 */
class Campaign
{
    use ActitoTrait;

    public function __construct()
    {
        $this->settings();
    }

    /**
     * Get a list of e-mail campaigns
     *
     * @link https://developers.actito.com/api-reference/campaigns-v4#operation/emailcampaigns-get-list
     *
     * @param string|null $name campaign name
     * @param string|null $type "MASS_SENDING" or "CONTINUOUS"
     * @param string|null $dateFilter Search criterion about time
     * @return array|null Array of objects (mailCampaign)
     */
    public function search(string $name = null, string $type = null, string $dateFilter = null): array | null
    {
        $url = 'v4/entity/' . $this->entity . '/mail';

        $query = [];

        if ($name != null) {
            $query['name'] = $name;
        }
        if ($type != null) {
            $query['type'] = $type;
        }
        if ($dateFilter != null) {
            $query['dateFilter'] = $dateFilter;
        }
        $response = $this->client->get($url, $query);

        return $response->json();
    }

    /**
     * Trigger a transactional e-mail
     *
     * @link https://developers.actito.com/api-reference/campaigns-v4/#operation/emailcampaigns-transactional-trigger
     *
     * @param string $campaignId
     * @param int $profileId
     * @param array $parameters
     * @return array|null
     */
    public function triggerProfile(string $campaignId, int $profileId, array $parameters): array|null
    {
        $url = 'v4/entity/' . $this->entity . '/mail/' . $campaignId . '/profile/' . $profileId;

        $data = $this->parametersData($parameters);
        $response = $this->client->post($url, $data);

        return $response->json();
    }

    /**
     * Trigger a transactional e-mail
     *
     * @link https://developers.actito.com/api-reference/campaigns-v4/#operation/emailcampaigns-transactional-trigger
     *
     * @param string $campaignId
     * @param array $profile
     * @param array $parameters
     * @return array|null
     */
    public function triggerTransactional(string $campaignId, array $profile, array $parameters): array|null
    {
        $url = 'v4/entity/' . $this->entity . '/transactionalmail/' . $campaignId . '/contact';

        $data = [
            'profile' => $this->profileData($profile),
            'parameters' => $this->parametersData($parameters),
        ];

        $response = $this->client->post($url, $data);

        return $response->json();
    }

    /**
     * Convert simple array to paired name/value array
     *
     * @param array $inputData
     * @param string $valueName
     * @return array
     */
    public function profileData(array $inputData): array
    {
        $outputData = [];
        foreach ($inputData as $key => $value) {
            $outputData[] = ['name' => $key, 'value' => $value];
        }

        return ['attributes' => $outputData];
    }

    /**
     * Convert simple array to paired name/value array
     *
     * @param array $inputData
     * @return array
     */
    public function parametersData(array $inputData): array
    {
        $outputData = [];
        foreach ($inputData as $key => $value) {
            $outputData[] = ['key' => $key, 'values' => [$value]];
        }

        return $outputData;
    }
}
