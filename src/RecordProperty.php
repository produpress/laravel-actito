<?php

namespace Produpress\Actito;

/**
 * Interface for Actito Data API Profile
 *
 * @link https://developers.actito.com/api-reference/data-v4/#tag/Profiles
 *
 * @package Produpress\Actito
 */
class RecordProperty
{
    public array $properties;

    public function __construct(array $dataArray)
    {
        $this->properties = $this->namedValues($dataArray);
    }

    /**
     * Returns an array of properties.
     *
     * @return array An array with the key 'properties' and a value of the properties array.
     */
    public function getProperties(): array
    {
        return ['properties' => $this->properties];
    }


    /**
     *
     * @param array $dataArray
     * @return array
     */
    static public function get(array $dataArray): array
    {
        $recordProperty = new self($dataArray);
        return $recordProperty->getProperties();
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
