<?php


namespace Magenest\Movie\Model\Config\Source;


class Movie implements \Magento\Framework\Data\OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => null,
                'label' => __('--Please Select--')
            ],
            [
                'value' => '1',
                'label' => __('show')
            ],
            [
                'value' => '2',
                'label' => __('not-show')
            ]
        ];
    }
}