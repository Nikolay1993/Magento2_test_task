<?php

namespace My\Working\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

    class Action extends Column
{
        public function prepareDataSource(array $dataSource)
        {
            $dataSource = parent::prepareDataSource($dataSource);

            if (empty($dataSource['data']['items'])) {
                return $dataSource;
            }

            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->context->getUrl(
                            'working/phone/edit',
                            [
                                'id' => $item['id']
                            ]
                        ),
                        'label' => __('Edit')
                    ],
                    'delete' => [
                        'href' => $this->context->getUrl(
                            'working/phone/delete',
                            [
                                'id' => $item['id']
                            ]
                        ),
                        'label' => __('Delete'),
                    ]
                ];
            }


            return $dataSource;

        }
}

