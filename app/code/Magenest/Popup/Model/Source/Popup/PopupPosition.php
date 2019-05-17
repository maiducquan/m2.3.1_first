<?php
namespace Magenest\Popup\Model\Source\Popup;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Eav\Model\Entity\Attribute\Source\SourceInterface;
use Magento\Framework\Data\OptionSourceInterface;

class PopupPosition extends AbstractSource implements SourceInterface, OptionSourceInterface{
    /**
     * Retrieve option array
     *
     * @return string[]
     */
    public static function getOptionArray()
    {
        return [
            \Magenest\Popup\Model\Popup::ALLPAGE => __('All Pages'),
            \Magenest\Popup\Model\Popup::HOMEPAGE => __('Home Page'),
            \Magenest\Popup\Model\Popup::CMSPAGE => __('All CMS Pages'),
            \Magenest\Popup\Model\Popup::CATEGORY => __('All Category Pages'),
            \Magenest\Popup\Model\Popup::PRODUCT => __('All Product Pages')
        ];
    }

    /**
     * Retrieve option array with empty value
     *
     * @return string[]
     */
    public function getAllOptions()
    {
        $result = [];

        foreach (self::getOptionArray() as $index => $value) {
            $result[] = ['value' => $index, 'label' => $value];
        }

        return $result;
    }
}
