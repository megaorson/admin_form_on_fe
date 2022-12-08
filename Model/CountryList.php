<?php

namespace Megaorson\CustomForm\Model;


class CountryList extends \Magento\Catalog\Model\AbstractModel
{
    const KEY_NAME = 'name';

    const KEY_CODE = 'code';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(\Megaorson\CustomForm\Model\ResourceModel\CountryList::class);
    }
}
