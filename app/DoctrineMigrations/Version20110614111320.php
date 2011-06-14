<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20110614111320 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE tb_comment CHANGE backlog_item_id task_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE tb_comment DROP FOREIGN KEY tb_comment_ibfk_1");
        $this->addSql("ALTER TABLE tb_comment ADD FOREIGN KEY (task_id) REFERENCES tb_task(id)");
        $this->addSql("CREATE INDEX IDX_EBA388CE8DB60186 ON tb_comment (task_id)");
        $this->addSql("DROP INDEX IDX_EBA388CE87653C79 ON tb_comment");
        $this->addSql("ALTER TABLE tb_task CHANGE item_type_id task_type_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE tb_task DROP FOREIGN KEY tb_task_ibfk_1");
        $this->addSql("ALTER TABLE tb_task ADD FOREIGN KEY (task_type_id) REFERENCES tb_task_type(id)");
        $this->addSql("CREATE INDEX IDX_90ED934DAADA679 ON tb_task (task_type_id)");
        $this->addSql("DROP INDEX IDX_C2381A8FCE11AAC7 ON tb_task");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE tb_comment CHANGE task_id backlog_item_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE tb_comment DROP FOREIGN KEY ");
        $this->addSql("ALTER TABLE tb_comment ADD CONSTRAINT tb_comment_ibfk_1 FOREIGN KEY (backlog_item_id) REFERENCES tb_task(id)");
        $this->addSql("CREATE INDEX IDX_EBA388CE87653C79 ON tb_comment (backlog_item_id)");
        $this->addSql("DROP INDEX IDX_EBA388CE8DB60186 ON tb_comment");
        $this->addSql("ALTER TABLE tb_task CHANGE task_type_id item_type_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE tb_task DROP FOREIGN KEY ");
        $this->addSql("ALTER TABLE tb_task ADD CONSTRAINT tb_task_ibfk_1 FOREIGN KEY (item_type_id) REFERENCES tb_task_type(id)");
        $this->addSql("CREATE INDEX IDX_C2381A8FCE11AAC7 ON tb_task (item_type_id)");
        $this->addSql("DROP INDEX IDX_90ED934DAADA679 ON tb_task");
    }
}