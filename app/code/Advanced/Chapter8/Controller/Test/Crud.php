<?php

namespace Advanced\Chapter8\Controller\Test;

class Crud extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        $block = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Text',
            'example_1'
        )->setText(
            '<p>Text_1</p>'
        );
        $resultPage->getLayout()->setChild(
            'content',
            $block->getNameInLayout(),
            'example_1_alias'
        );
        $blockLT = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Text\ListText',
            'example_2'
        );
        $resultPage->getLayout()->setChild(
            'content',
            $blockLT->getNameInLayout(),
            'example_2_alias'
        );
        $block2A = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Text',
            'example_2a'
        )->setText(
            '<p>Text_2A</p>'
        );
        $resultPage->getLayout()->setChild(
            'example_2',
            $block2A->getNameInLayout(),
            'example_2a_alias'
        );
        $block2B = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Text',
            'example_2b'
        )->setText(
            '<p>Text_2B</p>'
        );
        $resultPage->getLayout()->setChild(
            'example_2',
            $block2B->getNameInLayout(),
            'example_2b_alias'
        );
        $messagesBlock = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Messages',
            'example_3'
        );
        $messagesBlock->addSuccess('Text_3A: Success');
        $messagesBlock->addNotice('Text_3B: Notice');
        $messagesBlock->addWarning('Text_3C: Warning');
        $messagesBlock->addError('Text_3D: Error');
        $resultPage->getLayout()->setChild(
            'content',
            $messagesBlock->getNameInLayout(),
            'example_3_alias'
        );
        $templateBlock = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Template',
            'example_4'
        )->setTemplate(
            'Advanced_Chapter8::test/template.phtml'
        );
        $resultPage->getLayout()->setChild(
            'content',
            $templateBlock->getNameInLayout(),
            'example_4_alias'
        );
        return $resultPage;
    }
}
