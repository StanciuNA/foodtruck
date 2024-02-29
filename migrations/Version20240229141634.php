<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229141634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, preparateur_id INTEGER NOT NULL, etat_id INTEGER NOT NULL, description CLOB DEFAULT NULL, prix NUMERIC(6, 2) NOT NULL, date DATETIME NOT NULL, CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6EEAA67D7A841FC5 FOREIGN KEY (preparateur_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6EEAA67DD5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D19EB6921 ON commande (client_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D7A841FC5 ON commande (preparateur_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DD5E86FF ON commande (etat_id)');
        $this->addSql('CREATE TABLE etat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL)');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE repas (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, prix NUMERIC(5, 2) NOT NULL)');
        $this->addSql('CREATE TABLE repas_ingredient (repas_id INTEGER NOT NULL, ingredient_id INTEGER NOT NULL, PRIMARY KEY(repas_id, ingredient_id), CONSTRAINT FK_CC79FC391D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_CC79FC39933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_CC79FC391D236AAA ON repas_ingredient (repas_id)');
        $this->addSql('CREATE INDEX IDX_CC79FC39933FE08C ON repas_ingredient (ingredient_id)');
        $this->addSql('CREATE TABLE type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, role_id INTEGER NOT NULL, pseudo VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, dern_connection DATETIME DEFAULT NULL, CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64986CC499D ON user (pseudo)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE repas_ingredient');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
    }
}
