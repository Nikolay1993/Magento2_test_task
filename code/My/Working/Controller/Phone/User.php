<?php

namespace My\Working\Controller\Phone;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use \My\Working\Model\PhoneFactory;
use My\Working\Model\Phone;

class User extends Action
{
    protected $resultPageFactory;

    protected $phoneFactory;

    public function __construct(Context $context, PageFactory $pageFactory, PhoneFactory $phoneFactory)
    {
        $this->resultPageFactory = $pageFactory;
        $this->phoneFactory = $phoneFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $name = $this->getRequest()->getPost('name');
        $phone = $this->getRequest()->getPost('phone');

        $resultPage = $this->resultPageFactory->create();

        if(isset($name) && isset($phone)) {

            $model = $this->phoneFactory->create();
            $model->setName($name);
            $model->setPhone($phone);

            $model->setSatus(Phone::PROCESSING);

            try{
                $model->save();
                $this->messageManager->addSuccessMessage(__('User saved'));
            }
            catch(\Exception $e)
            {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
        return $resultPage;
    }


}


