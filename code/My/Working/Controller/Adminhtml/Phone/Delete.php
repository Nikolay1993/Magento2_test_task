<?php

namespace My\Working\Controller\Adminhtml\Phone;

use Magento\Backend\App\Action;

class Delete extends Action
{
    protected $phoneFactory;

    public function __construct(
        Action\Context $context,
        \My\Working\Model\PhoneFactory $phoneFactory
    ) {
        parent::__construct($context);
        $this->phoneFactory = $phoneFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                $model = $this->phoneFactory->create();
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('User deleted'));
                return $resultRedirect->setPath('working/phone/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('working/phone/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('User does not exist'));
        return $resultRedirect->setPath('working/phone/');
    }
}