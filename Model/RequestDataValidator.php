<?php

namespace Megaorson\CustomForm\Model;


use Magento\Framework\Validator\EmailAddress;
use Magento\Framework\Validator\NotEmpty;
use Zend_Validate_Exception;

class RequestDataValidator extends \Magento\Framework\Validator\AbstractValidator
{
    /**
     * @param RequestData $value
     * @return bool
     * @throws Zend_Validate_Exception
     */
    public function isValid($value) : bool
    {
        $messages = [];

        if (!\Zend_Validate::is($value->getData(RequestData::KEY_CODE), NotEmpty::class)) {
            $messages[] = __("The Country is empty");
        }
        if (!\Zend_Validate::is($value->getData(RequestData::KEY_NAME), NotEmpty::class)) {
            $messages[] = __("The Name is empty");
        }
        if (!\Zend_Validate::is($value->getData(RequestData::KEY_PHONE), NotEmpty::class)) {
            $messages[] = __("The Phone is empty");
        }
        if (!\Zend_Validate::is($value->getData(RequestData::KEY_IS_RANDOM_CHECK), NotEmpty::class)) {
            $messages[] = __("The Random check is empty");
        }
        if (!\Zend_Validate::is($value->getData(RequestData::KEY_EMAIL), NotEmpty::class)) {
            $messages[] = __("The email is empty");
        }
        if (!\Zend_Validate::is($value->getData(RequestData::KEY_EMAIL), EmailAddress::class)) {
            $messages[] = __("The email is not correct");
        }
        if (!\Zend_Validate::is($value->getData(RequestData::KEY_ADDRESS), NotEmpty::class)) {
            $messages[] = __("The address is empty");
        }

        $this->_addMessages($messages);
        return empty($messages);
    }
}
