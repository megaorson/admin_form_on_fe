<?php

namespace Megaorson\CustomForm\Model;


use Magento\Framework\Serialize\Serializer\Json;
use Megaorson\CustomForm\Model\ResourceModel\CountryList\Collection;
use Megaorson\CustomForm\Model\ResourceModel\CountryList\CollectionFactory;
use Megaorson\CustomForm\Model\ResourceModel\CountryList as ResourceCountryList;
use Megaorson\CustomForm\Model\ResourceModel\CountryListFactory as ResourceCountryListFactory;

class ImportCountries
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var Json
     */
    protected $json;

    /**
     * @var CountryListFactory
     */
    protected $countryListFactory;

    /**
     * @var ResourceCountryListFactory
     */
    protected $resourceCountryListFactory;

    /**
     * ImportCountries constructor.
     * @param Json $json
     * @param CountryListFactory $countryListFactory
     * @param ResourceCountryListFactory $resourceCountryListFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Json $json,
        CountryListFactory $countryListFactory,
        ResourceCountryListFactory $resourceCountryListFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->json = $json;
        $this->countryListFactory = $countryListFactory;
        $this->resourceCountryListFactory = $resourceCountryListFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return bool
     */
    public function clear() : bool
    {
        $this->collectionFactory->create()->clearTable();
        return true;
    }

    /**
     * @return bool
     */
    public function import() : bool
    {
        $countries = $this->json->unserialize(file_get_contents('https://restcountries.com/v3.1/all'));
        /** @var ResourceCountryList $resource */
        $resource = $this->resourceCountryListFactory->create();
        foreach ($countries as $country) {
            /** @var CountryList $item */
            $item = $this->countryListFactory->create();
            $item->setData(CountryList::KEY_CODE, $country['cca2'])
                ->setData(CountryList::KEY_NAME, $country['name']['common']);
            $resource->save($item);
        }

        return true;
    }
}
