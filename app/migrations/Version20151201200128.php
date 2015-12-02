<?php

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Migrations\AbstractMigration;

class Version20151201200128 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('users');

        $table->addColumn('id', 'integer')
            ->setUnsigned(true)
            ->setAutoincrement(true);
        $table->addColumn('name', 'string')->setNotnull(true);
        $table->addColumn('email', 'string')->setNotNull(true);
        $table->addColumn('password', 'string')->setNotNull(true);

        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['email']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
