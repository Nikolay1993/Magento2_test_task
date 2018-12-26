<?php
namespace My\Working\Model\ResourceModel\Phone;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'my_working_phone_collection';
    protected $_eventObject = 'phone_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('My\Working\Model\Phone', 'My\Working\Model\ResourceModel\Phone');
    }

}