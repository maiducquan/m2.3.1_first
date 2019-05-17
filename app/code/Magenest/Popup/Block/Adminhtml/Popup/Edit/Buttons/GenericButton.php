<?php
namespace Magenest\Popup\Block\Adminhtml\Popup\Edit\Buttons;

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
    public function getPopupId(){
        $templateModel = $this->_sessionTemplate->getData('popup');
        return $templateModel->getTemplateId();
    }
}