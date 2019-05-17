<?php
namespace Magenest\Popup\Ui\Component\Template\Form\Element;

use Magento\Framework\Data\FormFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Wysiwyg\ConfigInterface;

class Wysiwyg extends \Magento\Ui\Component\Form\Element\Wysiwyg{
    public function __construct(
        ContextInterface $context,
        FormFactory $formFactory,
        ConfigInterface $wysiwygConfig,
        array $components = [],
        array $data = [],
        array $config = []
    ){
        $config['wysiwyg'] = ['widget_filters' => ['is_email_compatible' => 1],'add_variables' => true];
        parent::__construct($context, $formFactory, $wysiwygConfig, $components, $data, $config);
    }
}