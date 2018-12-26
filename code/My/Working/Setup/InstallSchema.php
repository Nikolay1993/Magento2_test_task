<?php

namespace My\Working\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('my_working_phone')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Name'
        )->addColumn(
            'phone',
            Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Phone'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            255,
            [ 'nullable' => false, 'default' => '0' ],
            'Status'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}