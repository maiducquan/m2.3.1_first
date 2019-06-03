<?php

namespace Magenest\Movie\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class StarRating extends Column
{
    /**
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $stars = (int)($item[$this->getData('name')] / 2);
                $halfStar = $item[$this->getData('name')] % 2;
                $content = "";

                if ($stars != 0) {
                    for( $i = 0; $i < $stars; $i++) {
                        $content .= '<i class="star"></i>';
                    }
                }
                if ($halfStar == 1) {
                    $content .= '<i class="star half"></i>';
                }

                $item[$this->getData('name')] = html_entity_decode($content);

            }
        }
        return $dataSource;
    }
}