<?php
namespace Magenest\Popup\Block\Adminhtml\Template\Edit;

use Magenest\Popup\Model\ResourceModel\Template;

class GenericButton {
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /** @var \Magenest\Popup\Model\Session $_sessionTemplate */
    protected $_sessionTemplate;

    public function __construct(
        \Magenest\Popup\Model\Session $sessionTemplate,
        \Magento\Framework\UrlInterface $urlBuilder
    ){
        $this->_sessionTemplate = $sessionTemplate;
        $this->urlBuilder = $urlBuilder;
    }
    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
    public function getTemplateId(){
        $templateModel = $this->_sessionTemplate->getData('popup_template');
        return $templateModel->getTemplateId();
    }
}