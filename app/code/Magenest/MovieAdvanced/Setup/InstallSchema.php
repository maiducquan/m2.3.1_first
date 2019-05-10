<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 10:20
 */
namespace Magenest\MovieAdvanced\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface{
    protected $installer;
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
        $this->installer = $setup;

        $this->installer->startSetup();
        $tableMagenestDirector = $this->installer->getConnection()->newTable(
            'magenest_director_advanced'
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
            'magenest_actor_advanced'
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
        $tableMagenestMovie = $this->installer->getConnection()->newTable(
            'magenest_movie_advanced'
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
            [
                'nullable' => false,
                'unsigned' => true
            ]
        )->addForeignKey( $this->installer->getFkName(
            'magenest_movie_advanced',
            'director_id',
            'magenest_director_advanced',
            'director_id'
            ),
            'director_id',
            $this->installer->getTable('magenest_director_advanced'),
            'director_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
        $this->installer->getConnection()->createTable($tableMagenestMovie);

        $tableMagenestMovieActor = $this->installer->getConnection()->newTable(
            'magenest_movie_actor_advanced'
        )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'nullable' => false,
                'unsigned' => true
            ]
        )->addForeignKey( $this->installer->getFkName(
            'magenest_movie_actor_advanced',
            'movie_id',
            'magenest_movie_advanced',
            'movie_id'
            ),
            'movie_id',
            $this->installer->getTable('magenest_movie_advanced'),
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'nullable' => false,
                'unsigned' => true
            ]
        )->addForeignKey( $this->installer->getFkName(
            'magenest_movie_actor_advanced',
            'actor_id',
            'magenest_actor_advanced',
            'actor_id'
            ),
            'actor_id',
            $this->installer->getTable('magenest_actor_advanced'),
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
        $this->installer->getConnection()->createTable($tableMagenestMovieActor);
        $this->installer->endSetup();
    }
}