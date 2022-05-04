<?php

namespace Produpress\Actito;

class Actito
{
    /**
     * Profile
     *
     * @link https://developers.actito.com/api-reference/data-v4/#tag/Profiles
     *
     * @param string|null $tableId
     * @return Profile
     */
    public function profile(string $tableId = null)
    {
        return new Profile($tableId);
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
        $outputData = [];
        foreach ($inputData as $key => $value) {
            $outputData[] = ['name' => $key, $valueName => $value];
        }
        return $outputData;
    }
}
