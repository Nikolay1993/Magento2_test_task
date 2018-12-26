<?php

namespace My\Working\Block;

use Magento\Framework\View\Element\Template;

class User extends Template
{

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

    public function getFormAction()
    {
        return '/test/phone/user';
    }

}
