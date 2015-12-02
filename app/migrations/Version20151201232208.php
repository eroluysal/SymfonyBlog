<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151201232208 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('comments');

        $table->addColumn('id', 'integer')
            ->setUnsigned(true)
            ->setAutoincrement(true);
        $table->addColumn('user_id', 'integer')
            ->setNotnull(true)
            ->setUnsigned(true);
        $table->addColumn('post_id', 'integer')
            ->setNotnull(true)
            ->setUnsigned(true);
        $table->addColumn('comment', 'text')->setNotnull(true);
        $table->addColumn('created_at', 'datetime')->setNotnull(true);
        $table->addColumn('updated_at', 'datetime')->setNotnull(true);

        $table->setPrimaryKey(['id']);
        $table->addIndex(['user_id', 'post_id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('comments');
    }
}
