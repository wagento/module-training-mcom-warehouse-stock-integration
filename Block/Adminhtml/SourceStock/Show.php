<?php

namespace Training\McomWarehouseStockIntegration\Block\Adminhtml\SourceStock;

use Magento\Backend\Block\Template;

class Show extends Template
{
    public function getSourceStocks()
    {
        $post = $this->getRequest()->getPost()->toArray();

        if (empty($post['sku'])) {
            return [];
        }

        // return proper values
        return [
            [
                'source_id' => 'West Coast',
                'quantity' => 62
            ],
            [
                'source_id' => 'Middle Coast',
                'quantity' => 99
            ],
            [
                'source_id' => 'East Coast',
                'quantity' => 33
            ],
        ];
    }
}
