<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328225635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE prixtot prixtot DOUBLE PRECISION NOT NULL, CHANGE etatcomm etatcomm VARCHAR(55) NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2782EA2E54');
        $this->addSql('DROP INDEX IDX_29A5EC2782EA2E54 ON produit');
        $this->addSql('ALTER TABLE produit DROP commande_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE prixtot prixtot DOUBLE PRECISION DEFAULT NULL, CHANGE etatcomm etatcomm VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produit ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2782EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2782EA2E54 ON produit (commande_id)');
    }
}
