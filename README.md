# Recettes

Recueil de recettes de famille, trouvées çà et là, pour les retrouver facilement.

Chaque recette a ses ingrédients (groupés, avec quantités et unités), ses étapes, ses tags et sa photo. On peut filtrer par tag, par ingrédient et par statut (déjà faite ou à essayer). Les recettes sont rangées par section (par exemple « Recettes » et « Cosmétique »).

> **État du projet : en construction.** Le modèle de données et l'environnement Docker sont en place. L'API et l'interface React sont les prochaines étapes (voir la feuille de route).

## Stack

| Rôle | Technologie |
|---|---|
| Back | Symfony 8.1, PHP 8.4 |
| API | API Platform *(prévu)* |
| Front | React *(prévu)* |
| Base de données | PostgreSQL 16, Doctrine ORM et migrations |
| Environnement | Docker Compose (PHP-FPM, nginx, PostgreSQL, Mailpit, Adminer) |

## Fonctionnalités prévues

- Consulter les recettes sans compte.
- Créer et modifier recettes, tags, ingrédients et unités de mesure en étant connecté.
- Quantités ajustables selon le nombre de parts.
- Recherche par titre, filtres par tags, ingrédients et statut.
- Deux rôles : administrateur (gestion des comptes) et utilisateur. Pas d'inscription ouverte : les comptes sont créés par les administrateurs.
- Chaque utilisateur modifie son propre profil (nom, e-mail, mot de passe).
- Thème clair, sombre ou automatique, selon le réglage de l'appareil.

## Modèle de données

`Recipe` · `Ingredient` · `IngredientGroup` · `RecipeIngredient` · `Tag` · `Unit` · `Section` · `User`

Une ligne d'ingrédient (`RecipeIngredient`) a une quantité et une unité, plus une équivalence facultative (par exemple « 8 cl (80 ml) »), une note et un indicateur « ajustable selon les parts ». Chaque tag appartient à une section.

## Installation

Prérequis : Docker Desktop.

```bash
# Démarrer les conteneurs
docker compose up -d

# Installer les dépendances PHP
docker compose exec php composer install

# Créer le schéma et les données de départ (sections, unités)
docker compose exec php bin/console doctrine:migrations:migrate --no-interaction
```

| Service | Adresse |
|---|---|
| Application (nginx) | http://localhost:8080 |
| Adminer (base de données) | http://localhost:8082 |
| Mailpit (e-mails de test) | port publié dynamiquement, voir `docker compose ps` |

Les valeurs de `.env` sont des valeurs par défaut pour le développement. Les vrais secrets vont dans `.env.local`, qui n'est pas versionné.

## Tests

```bash
docker compose exec php bin/phpunit
```

Les tests ne sont pas encore écrits : chaque ressource de l'API aura un test fonctionnel.

## Feuille de route

- [x] Modèle de données et migrations
- [x] Environnement Docker
- [ ] Mise à jour des dépendances (correctifs de sécurité)
- [ ] API REST avec API Platform, droits d'accès (lecture publique, écriture pour les comptes connectés)
- [ ] Interface React
- [ ] Tests et intégration continue
- [ ] Reprise des recettes de la version précédente (Laravel + Statamic)
- [ ] Déploiement en ligne et démo avec données d'exemple
