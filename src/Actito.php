<?php

namespace Produpress\Actito;

class Actito
{

    /**
     * Profile
     *
     * @link https://developers.actito.com/api-reference/data-v4/#tag/Profiles
     *
     * @param int|null $profileId
     * @return Profile
     */
    public function profile(int $profileId = null)
    {
        return new Profile($profileId);
    }

    /**
     * Custom table
     *
     * @link https://developers.actito.com/api-reference/data-v4/#tag/Custom-Table-Records
     *
     * @param string $customTableId
     * @return CustomTable
     */
    public function customTable(string $customTableId)
    {
        return new CustomTable($customTableId);
    }

    /**
     * Convert simple array to paired name/value array
     *
     * @param array $inputData
     * @param string $valueName
     * @return array
     */
    public function namedValues(array $inputData, string $valueName = 'value'): array
    {
        $outpudData = [];
        foreach ($inputData as $key => $value) {
            $outpudData[] = ['name' => $key, $valueName => $value];
        }
        return $outpudData;
    }
}
