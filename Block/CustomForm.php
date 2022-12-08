<?php

namespace Megaorson\CustomForm\Block;


use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\View\Element\Template;

class CustomForm extends \Magento\Framework\View\Element\Template
{
    /**
     * @var FormKey
     */
    protected $formKey;

    /**
     * CustomForm constructor.
     * @param FormKey $formKey
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        FormKey $formKey,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->formKey = $formKey;
    }

    /**
     * @return string
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}
