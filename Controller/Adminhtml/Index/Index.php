<?php

namespace Megaorson\CustomForm\Controller\Adminhtml\Index;


use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
