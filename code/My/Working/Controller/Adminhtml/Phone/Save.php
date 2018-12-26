<?php

namespace My\Working\Controller\Adminhtml\Phone;

use \Magento\Backend\App\Action;

class Save extends Action
{

    protected $phoneFactory;

    public function __construct(
         Action\Context $context,
         \My\Working\Model\PhoneFactory $phoneFactory
    )
    {
        $this->phoneFactory = $phoneFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if($data)
        {
            $model = $this->phoneFactory->create();
            $data = array_filter($data, function($value) {return $value !== ''; });
            $model->setData($data);

            try{
                $model->save();
                $this->messageManager->addSuccessMessage(__('Successfully saved the item.'));
                $this->_getSession()->setFormData(false);
                return $resultRedirect->setPath('working/phone/');
            }
            catch(\Exception $e)
            {
                $this->messageManager->addErrorMessage($e->getMessage());
                $this->_getSession()->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
            }
        }

        return $resultRedirect->setPath('working/phone/');
    }
}


