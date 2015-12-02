<?php

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Migrations\AbstractMigration;

class Version20151201204414 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('posts');

        $table->addColumn('id', 'integer')
            ->setUnsigned(true)
            ->setAutoincrement(true);
        $table->addColumn('user_id', 'integer')
            ->setNotnull(true)
            ->setUnsigned(true);
        $table->addColumn('title', 'string')->setNotnull(true);
        $table->addColumn('slug', 'string')->setNotnull(true);
        $table->addColumn('content', 'text')->setNotnull(true);
        $table->addColumn('created_at', 'datetime')->setNotnull(true);
        $table->addColumn('updated_at', 'datetime')->setNotnull(true);

        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['slug']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('posts');
    }
}
