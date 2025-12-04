<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251204224926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE doctor_profile_id_seq CASCADE');
        $this->addSql('CREATE TABLE doctor (id SERIAL NOT NULL, compte_id INT NOT NULL, speciality VARCHAR(100) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1FC0F36AF2C56620 ON doctor (compte_id)');
        $this->addSql('CREATE TABLE parametrage (id SERIAL NOT NULL, name_app VARCHAR(30) NOT NULL, adresse TEXT DEFAULT NULL, logo VARCHAR(40) DEFAULT NULL, phone VARCHAR(10) NOT NULL, type_appointement VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE patient (id SERIAL NOT NULL, compte_id INT NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBF2C56620 ON patient (compte_id)');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36AF2C56620 FOREIGN KEY (compte_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBF2C56620 FOREIGN KEY (compte_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor_profile DROP CONSTRAINT fk_12fac9a287f4fb17');
        $this->addSql('DROP TABLE doctor_profile');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT FK_BD9991CD6B899279');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT FK_BD9991CD87F4FB17');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CD6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CD87F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT FK_BD9991CD87F4FB17');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT FK_BD9991CD6B899279');
        $this->addSql('CREATE SEQUENCE doctor_profile_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE doctor_profile (id SERIAL NOT NULL, doctor_id INT NOT NULL, speciality VARCHAR(100) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_12fac9a287f4fb17 ON doctor_profile (doctor_id)');
        $this->addSql('ALTER TABLE doctor_profile ADD CONSTRAINT fk_12fac9a287f4fb17 FOREIGN KEY (doctor_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36AF2C56620');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EBF2C56620');
        $this->addSql('DROP TABLE doctor');
        $this->addSql('DROP TABLE parametrage');
        $this->addSql('DROP TABLE patient');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT fk_bd9991cd87f4fb17');
        $this->addSql('ALTER TABLE appointement DROP CONSTRAINT fk_bd9991cd6b899279');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT fk_bd9991cd87f4fb17 FOREIGN KEY (doctor_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT fk_bd9991cd6b899279 FOREIGN KEY (patient_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
