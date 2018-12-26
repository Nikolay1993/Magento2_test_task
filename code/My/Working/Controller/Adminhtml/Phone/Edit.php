<?php

namespace My\Working\Controller\Adminhtml\Phone;

use Magento\Backend\App\Action;

class Edit extends Action
{

    protected $_coreRegistry = null;

    protected $_resultPageFactory;

    protected $phoneFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \My\Working\Model\PhoneFactory $phoneFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->phoneFactory = $phoneFactory;
        parent::__construct($context);
    }


    protected function _initAction()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('My_Working::phone')
            ->addBreadcrumb(__('User'), __('User'))
            ->addBreadcrumb(__('Manage User'), __('Manage User'));
        return $resultPage;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->phoneFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This users not exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('working/phone/');
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('phone', $model);

        $resultPage = $this->_initAction();

        $resultPage->addBreadcrumb(
            $id ? __('Edit User') : __('New User'),
            $id ? __('Edit User') : __('New User')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('User'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New User'));

        return $resultPage;
    }
}