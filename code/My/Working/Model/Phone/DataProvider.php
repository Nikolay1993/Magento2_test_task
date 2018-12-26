<?php
namespace My\Working\Model\Phone;

use My\Working\Model\ResourceModel\Phone\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $phoneCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $phoneCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function prepareMeta(array $meta)
    {
        return $meta;
    }


    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach ($items as $user) {
            $this->loadedData[$user->getId()] = $user->getData();
        }

        return $this->loadedData;

    }


}
