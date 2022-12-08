<?php

namespace Megaorson\CustomForm\Model\ResourceModel\RequestData;


use Megaorson\CustomForm\Model\RequestData;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(RequestData::class, \Megaorson\CustomForm\Model\ResourceModel\RequestData::class);
    }
}
