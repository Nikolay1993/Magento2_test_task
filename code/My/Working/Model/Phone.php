<?php

namespace My\Working\Model;

use \Magento\Framework\Model\AbstractModel;

class Phone extends AbstractModel
{

    const PROCESSING = 0;
    const APPROVED = 1;

    protected function _construct()
    {
        $this->_init('My\Working\Model\ResourceModel\Phone');
    }

        public function getAvailableStatuses()
        {
            return [self::APPROVED => __('Approved'), self::PROCESSING => __('Processing')];
        }

}