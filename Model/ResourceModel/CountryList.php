<?php

namespace Megaorson\CustomForm\Model\ResourceModel;


class CountryList extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('megaorson_country_list', 'entity_id');
    }
}
