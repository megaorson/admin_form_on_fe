<?php

namespace Megaorson\CustomForm\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Megaorson\CustomForm\Model\ImportCountries;

class Import extends \Magento\Backend\App\Action
{
    /**
     * @var ImportCountries
     */
    protected $importCounties;

    /**
     * Import constructor.
     * @param ImportCountries $importCounties
     * @param Action\Context $context
     */
    public function __construct(
        ImportCountries $importCounties,
        Action\Context $context
    ) {
        $this->importCounties = $importCounties;
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        try {
            $this->importCounties->clear();
            $this->importCounties->import();
            $this->messageManager->addSuccessMessage("Import good");
        } catch (\Exception $ex) {
            $this->messageManager->addErrorMessage($ex->getMessage());
        }

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
