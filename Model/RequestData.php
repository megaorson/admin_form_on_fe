<?php

namespace Megaorson\CustomForm\Model;


use Magento\Framework\Api\AttributeValueFactory;

class RequestData extends \Magento\Catalog\Model\AbstractModel
{
    const KEY_CODE = 'code';

    const KEY_NAME = 'name';

    const KEY_PHONE = 'phone';

    const KEY_IS_RANDOM_CHECK = 'is_random_check';

    const KEY_EMAIL = 'email';

    const KEY_ADDRESS = 'address';

    /**
     * @var RequestDataValidator
     */
    protected $requestDataValidator;

    /**
     * @param RequestDataValidator $requestDataValidator
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory
     * @param AttributeValueFactory $customAttributeFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        RequestDataValidator $requestDataValidator,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        AttributeValueFactory $customAttributeFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $extensionFactory,
            $customAttributeFactory,
            $storeManager,
            $resource,
            $resourceCollection,
            $data
        );
        $this->requestDataValidator = $requestDataValidator;
    }

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(\Megaorson\CustomForm\Model\ResourceModel\RequestData::class);
    }

    /**
     * Template method to return validate rules for the entity
     *
     * @return \Zend_Validate_Interface|null
     */
    protected function _getValidationRulesBeforeSave()
    {
        return $this->requestDataValidator;
    }
}
