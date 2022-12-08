<?php

namespace Megaorson\CustomForm\Model\ResourceModel\CountryList;


use Magento\Framework\Data\OptionSourceInterface;
use Megaorson\CustomForm\Model\CountryList;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
implements OptionSourceInterface
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CountryList::class, \Megaorson\CustomForm\Model\ResourceModel\CountryList::class);
    }

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function clearTable() : void
    {
        $this->getConnection()->delete($this->getResource()->getMainTable());
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $this->load();
        $result = [
            [
                'value' => '',
                'label' => __('Country'),
            ]
        ];
        foreach ($this as $country) {
            $result[] = [
                'value' => $country['code'],
                'label' => $country['name'],
            ];
        }

        return $result;
    }
}
