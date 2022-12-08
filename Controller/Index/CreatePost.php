<?php

namespace Megaorson\CustomForm\Controller\Index;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Megaorson\CustomForm\Helper\Data;
use Megaorson\CustomForm\Model\RequestData;
use Megaorson\CustomForm\Model\ResourceModel\RequestData as ResourceRequestData;
use Megaorson\CustomForm\Model\ResourceModel\RequestDataFactory as ResourceRequestDataFactory;
use Megaorson\CustomForm\Model\RequestDataFactory;

class CreatePost extends \Magento\Framework\App\Action\Action
{
    /**
     * @var RequestDataFactory
     */
    protected $requestDataFactory;

    /**
     * @var ResourceRequestDataFactory
     */
    protected $resourceRequestDataFactory;

    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * CreatePost constructor.
     * @param Data $dataHelper
     * @param ResourceRequestDataFactory $resourceRequestDataFactory
     * @param RequestDataFactory $requestDataFactory
     * @param Context $context
     */
    public function __construct(
        Data $dataHelper,
        ResourceRequestDataFactory $resourceRequestDataFactory,
        RequestDataFactory $requestDataFactory,
        Context $context
    ) {
        parent::__construct($context);
        $this->dataHelper = $dataHelper;
        $this->resourceRequestDataFactory = $resourceRequestDataFactory;
        $this->requestDataFactory = $requestDataFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $response = new \Magento\Framework\DataObject();
        $response->setError(0);
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $request = $this->getRequest()->getParam('request_data');
        $this->dataHelper->getRequestLogFile()->info(__('RequestData: '), ['request' => $request]);

        try {
            $resource = $this->resourceRequestDataFactory->create();
            /** @var RequestData $requestData */
            $requestData = $this->requestDataFactory->create();
            $requestData->setData($request);
            $requestData->validateBeforeSave();
            $resource->save($requestData);
            $this->messageManager->addSuccessMessage(__("Success"));
        } catch (\Exception $ex) {
            $this->dataHelper->getErrorLogFile()->error(__('ErrorData: '), ['response' => $ex->getMessage()]);
            $response->setError(1);
            $this->messageManager->addErrorMessage(__("Error"));
        }

        $this->dataHelper->getResponseLogFile()->info(__('ResponseData: '), ['response' => $response]);
        $resultJson->setData($response);
        return $resultJson;
    }
}
