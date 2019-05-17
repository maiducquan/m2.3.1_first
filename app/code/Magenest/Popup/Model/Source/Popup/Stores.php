<?php
namespace Magenest\Popup\Model\Source\Popup;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Eav\Model\Entity\Attribute\Source\SourceInterface;
use Magento\Framework\Data\OptionSourceInterface;

class Stores implements OptionSourceInterface
{
    /** @var \Magento\Store\Model\System\Store $_systemStore */
    protected $_systemStore;

    public function  __construct(
        \Magento\Store\Model\System\Store $systemStore
    ){
        $this->_systemStore = $systemStore;
    }

    /**
     * Retrieve option array
     *
     * @return string[]
     */
    public static function getOptionArray()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $systemStore = $objectManager->get(\Magento\Store\Model\System\Store::class);
        return $systemStore->getStoreValuesForForm(false, true);
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
    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        $result = [];
        foreach ($this->_systemStore->getStoreValuesForForm() as $index => $value) {
            $result[] = ['value' => $index, 'label' => $value];
        }
        return $result;
    }
}