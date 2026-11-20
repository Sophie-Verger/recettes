<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261005093735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO section (name, slug, position) VALUES
            ('Recettes', 'recettes', 1),
            ('Cosmétique', 'cosmetique', 2)");

        $this->addSql("INSERT INTO unit (name, symbol, plural_name, category, base_factor, use_for_shopping, position) VALUES
            ('gramme', 'g', NULL, 'weight', 1, true, 1),
            ('kilogramme', 'kg', NULL, 'weight', 1000, true, 2),
            ('millilitre', 'ml', NULL, 'volume', 1, true, 3),
            ('centilitre', 'cl', NULL, 'volume', 10, true, 4),
            ('litre', 'l', NULL, 'volume', 1000, true, 5),
            ('tasse', 'tasse', 'tasses', 'volume', NULL, false, 6),
            ('cuillère à soupe', 'c. à soupe', 'c. à soupe', 'spoon', NULL, false, 7),
            ('cuillère à café', 'c. à café', 'c. à café', 'spoon', NULL, false, 8),
            ('cuillère à thé', 'c. à thé', 'c. à thé', 'spoon', NULL, false, 9),
            ('pincée', 'pincée', 'pincées', 'other', NULL, false, 10),
            ('pot', 'pot', 'pots', 'other', NULL, true, 11),
            ('cube', 'cube', 'cubes', 'other', NULL, true, 12),
            ('sachet', 'sachet', 'sachets', 'other', NULL, true, 13),
            ('gousse', 'gousse', 'gousses', 'other', NULL, true, 14),
            ('tranche', 'tranche', 'tranches', 'other', NULL, true, 15)");

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM unit');
        $this->addSql('DELETE FROM section');

    }
}
