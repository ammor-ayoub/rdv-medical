<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251008110307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointement (id SERIAL NOT NULL, doctor_id INT NOT NULL, patient_id INT NOT NULL, start_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, end_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, numbre_appointment SMALLINT DEFAULT NULL, status VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BD9991CD87F4FB17 ON appointement (doctor_id)');
        $this->addSql('CREATE INDEX IDX_BD9991CD6B899279 ON appointement (patient_id)');
        $this->addSql('CREATE TABLE doctor_profile (id SERIAL NOT NULL, doctor_id INT NOT NULL, speciality VARCHAR(100) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_12FAC9A287F4FB17 ON doctor_profile (doctor_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(60) NOT NULL, last_name VARCHAR(60) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CD87F4FB17 FOREIGN KEY (doctor_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CD6B899279 FOREIGN KEY (patient_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor_profile ADD CONSTRAINT FK_12FAC9A287F4FB17 FOREIGN KEY (doctor_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT FK_BD9991CD87F4FB17');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT FK_BD9991CD6B899279');
        $this->addSql('ALTER TABLE doctor_profile DROP CONSTRAINT FK_12FAC9A287F4FB17');
        $this->addSql('DROP TABLE appointement');
        $this->addSql('DROP TABLE doctor_profile');
        $this->addSql('DROP TABLE "user"');
    }
}
