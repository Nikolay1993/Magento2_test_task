<?php

namespace My\Working\Model\Source;

use \Magento\Framework\Data\OptionSourceInterface;
use \My\Working\Model\Phone;

class Status implements OptionSourceInterface
{

    protected $_user;


    public function __construct(Phone $user)
    {
        $this->_user = $user;
    }

    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_user->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}