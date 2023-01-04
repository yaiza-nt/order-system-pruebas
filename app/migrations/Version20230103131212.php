<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103131212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER INDEX idx_f5299398910ac1a7 RENAME TO IDX_F529939866C5951B');
        $this->addSql('ALTER TABLE order_line ADD order_id UUID NOT NULL');
        $this->addSql('ALTER TABLE order_line ADD product_id UUID NOT NULL');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE18D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE14584665A FOREIGN KEY (product_id) REFERENCES product (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9CE58EE18D9F6D38 ON order_line (order_id)');
        $this->addSql('CREATE INDEX IDX_9CE58EE14584665A ON order_line (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_line DROP CONSTRAINT FK_9CE58EE18D9F6D38');
        $this->addSql('ALTER TABLE order_line DROP CONSTRAINT FK_9CE58EE14584665A');
        $this->addSql('DROP INDEX IDX_9CE58EE18D9F6D38');
        $this->addSql('DROP INDEX IDX_9CE58EE14584665A');
        $this->addSql('ALTER TABLE order_line DROP order_id');
        $this->addSql('ALTER TABLE order_line DROP product_id');
    }
}
