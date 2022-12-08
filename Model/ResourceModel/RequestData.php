<?php

namespace Megaorson\CustomForm\Model\ResourceModel;


class RequestData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('megaorson_request_data', 'entity_id');
    }
}
