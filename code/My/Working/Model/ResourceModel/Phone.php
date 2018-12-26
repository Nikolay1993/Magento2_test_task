<?php
namespace My\Working\Model\ResourceModel;

use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\AbstractModel;

class Phone extends AbstractDb
{

//    protected $entityManager;
//
//    public function __construct(
//        Context $context,
//        EntityManager $entityManager
//    )
//    {
//        $this->entityManager = $entityManager;
//        parent::__construct($context);
//    }

    protected function _construct()
    {
        $this->_init('my_working_phone', 'id');
    }

//    public function save(AbstractModel $object)
//    {
//        $this->entityManager->save($object);
//        return $this;
//    }
//
//    public function delete(AbstractModel $object)
//    {
//        $this->entityManager->delete($object);
//        return $this;
//    }

}