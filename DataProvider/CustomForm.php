<?php

namespace Megaorson\CustomForm\DataProvider;


class CustomForm extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @inheritDoc
     */
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
            'request_data' => [
                'form_key' => 'test'
            ]
        ];
    }
}
