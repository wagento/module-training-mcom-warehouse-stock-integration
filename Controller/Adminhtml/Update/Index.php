<?php

namespace Training\McomWarehouseStockIntegration\Controller\Adminhtml\Update;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Authorization level of a basic admin session.
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Backend::content';

    /** @var PageFactory */
    protected $pageFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $post = $this->_request->getPost()
            ->toArray();

        if (!empty($post)) {
            if (empty($post['sku'])) {
                $this->messageManager->addErrorMessage('Missing SKU value');
            }
            if (empty($post['quantity'])) {
                $this->messageManager->addErrorMessage('Missing quantity value');
            }

            if (!empty($post['sku']) && !empty($post['quantity'])) {
                $this->publishMessage();
                $this->messageManager->addSuccessMessage(
                    sprintf(
                        'Source stock with quantity %s for SKU %s in source %s sent',
                        $post['quantity'],
                        $post['sku'],
                        $post['source']
                    )
                );
            }
        }

        $page_object = $this->pageFactory->create();
        return $page_object;
    }

    private function publishMessage()
    {
        // do your thing
    }
}
