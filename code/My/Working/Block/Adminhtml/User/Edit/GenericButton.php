<?php
namespace My\Working\Block\Adminhtml\User\Edit;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Backend\Block\Widget\Context;

class GenericButton
{

    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public function getUserId()
    {
        try {
            return
                $this->context->getRequest()->getParam('id');
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}