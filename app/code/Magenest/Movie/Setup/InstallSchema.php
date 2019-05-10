<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 08/05/2019
 * Time: 14:46
 */
namespace Magenest\Movie\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface{
    protected $installer;
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
        $this->installer = $setup;

        $this->installer->startSetup();
        $tableMagenestMovie = $this->installer->getConnection()->newTable(
            'magenest_movie'
        )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
                'identity' => true,
                'unsigned' => true,
                'primary' => true,
                'nullable' => false,
            ]
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            64,
            []
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            225,
            []
        )->addColumn(
            'rating',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            []
        )->addColumn(
            'director_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            []
        );
        $this->installer->getConnection()->createTable($tableMagenestMovie);

        $tableMagenestDirector = $this->installer->getConnection()->newTable(
            'magenest_director'
        )->addColumn(
            'director_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
                'identity' => true,
                'unsigned' => true,
                'primary' => true,
                'nullable' => false,
            ]
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            64,
            []
        );
        $this->installer->getConnection()->createTable($tableMagenestDirector);

        $tableMagenestActor = $this->installer->getConnection()->newTable(
            'magenest_actor'
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null, [
                'identity' => true,
                'unsigned' => true,
                'primary' => true,
                'nullable' => false,
            ]
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            64,
            []
        );
        $this->installer->getConnection()->createTable($tableMagenestActor);

        $tableMagenestMovieActor = $this->installer->getConnection()->newTable(
            'magenest_movie_actor'
        )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            []
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            []
        );
        $this->installer->getConnection()->createTable($tableMagenestMovieActor);
        $this->installer->endSetup();
    }
}
