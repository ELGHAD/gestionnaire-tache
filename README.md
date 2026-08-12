# Gestionnaire de Tâches (Symfony)

> Modélisation de domaine pour une future application de gestion de tâches et de projets, avec entités Doctrine et enums PHP.

![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat&logo=php&logoColor=white)
![Symfony](https://img.shields.io/badge/Symfony-5.4-000000?style=flat&logo=symfony&logoColor=white)
![Status](https://img.shields.io/badge/Status-Work%20in%20Progress-orange)
![License](https://img.shields.io/badge/License-Not%20specified-lightgrey)

## Aperçu du projet

Ce projet pose les fondations d'une application de gestion de tâches en équipe (utilisateurs, projets, tâches) avec le framework Symfony et l'ORM Doctrine. Il modélise un domaine métier avec trois rôles utilisateurs (Admin, Manager, User) via un héritage d'entités, des projets contenant des tâches, et un système de notifications.

**État actuel : projet en phase de modélisation.** La couche métier (contrôleurs, routes, formulaires, sécurité applicative) n'est pas encore implémentée — seule la structure de données (entités, enums, repositories générés) est en place.

## Fonctionnalités prévues (modélisées, non implémentées)

- Hiérarchie d'utilisateurs — `Utilisateur` (classe de base) avec trois sous-types (`Admin`, `Manager`, `User`) via l'héritage Doctrine par jointure (`InheritanceType('JOINED')`), discriminés par un champ `role`.
- Gestion de projets — entité `Project` avec statut (`ProjectStatus`), échéance, et collection de tâches associées.
- Gestion de tâches — entité `Task` avec priorité (`Priority`), statut (`TaskStatus`), échéance, rattachée à un projet et à un utilisateur assigné.
- Notifications — entité `Notification` liée à un utilisateur (le code laisse une note pour une future intégration du composant Mailer).
- Enums métier typés — `Role`, `ProjectStatus`, `TaskStatus`, `Priority`, implémentés en enums PHP natifs (`backed enum`) et intégrés directement dans le typage Doctrine (`enumType`).

## Architecture & Stack technique

| Élément | Détail |
|---|---|
| **Framework** | Symfony 5.4 |
| **Langage** | PHP 8.1+ (nécessaire pour les enums natifs) |
| **ORM** | Doctrine ORM 2.19, avec Doctrine Migrations |
| **Base de données** | MySQL (à configurer via `.env`, absent du dépôt) |
| **Templating** | Twig (uniquement le layout de base généré, aucune vue métier) |
| **Génération de code** | Symfony Maker Bundle (entités et repositories scaffoldés) |

**Entités et enums :**

| Fichier | Rôle |
|---|---|
| `Entity/Utilisateur.php` | Classe de base des utilisateurs (héritage JOINED, discriminant `role`) |
| `Entity/Admin.php`, `Manager.php`, `User.php` | Sous-types d'utilisateur avec méthodes métier à implémenter |
| `Entity/Project.php` | Projet (nom, description, échéance, statut, tâches) |
| `Entity/Task.php` | Tâche (nom, description, échéance, statut, priorité, projet, utilisateur assigné) |
| `Entity/Notification.php` | Notification liée à un utilisateur |
| `Enum/Role.php`, `ProjectStatus.php`, `TaskStatus.php`, `Priority.php` | Enums métier typés |

## Installation & Démarrage rapide

### Prérequis
- PHP 8.1+
- Composer
- MySQL
- Symfony CLI (recommandé)

### Étapes

```bash
git clone https://github.com/ELGHAD/gestionnaire-tache.git
cd gestionnaire-tache

composer install

# Créer le fichier .env (absent du dépôt) et configurer la connexion DB
cp .env.test .env
# Éditer DATABASE_URL dans .env, ex :
# DATABASE_URL="mysql://user:password@127.0.0.1:3306/gestionnaire_tache"

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

symfony server:start
# ou
php -S localhost:8000 -t public/
```

> À ce stade, l'application ne propose aucune route fonctionnelle : ces étapes permettent de vérifier que le schéma de base de données se crée correctement à partir des entités, pas encore de naviguer sur un site.

## Structure du projet
    gestionnaire-tache/
    ├── src/
    │ ├── Entity/ # Utilisateur, Admin, Manager, User, Project, Task, Notification
    │ ├── Enum/ # Role, ProjectStatus, TaskStatus, Priority
    │ ├── Repository/ # Repositories Doctrine générés (add/remove)
    │ ├── Controller/ # Vide — aucun contrôleur pour l'instant
    │ └── Kernel.php
    ├── config/ # Configuration Symfony (packages, routes, sécurité)
    ├── migrations/ # Migrations Doctrine
    ├── templates/
    │ └── base.html.twig # Layout de base uniquement
    └── composer.json
## Points d'attention avant de présenter ce projet

- **Bugs à corriger dans les entités** — `Project::getIdProject()`/`setIdProject()`, `Utilisateur::getIdUtilisateur()` et `Task::getIdTask()` référencent des propriétés inexistantes (`$id` est le seul champ identifiant réellement déclaré) ; `Manager.php` et `User.php` utilisent `Collection`/`ArrayCollection` sans les importer. Ces erreurs empêcheraient le projet de fonctionner en l'état.
- **Aucune logique métier implémentée** — toutes les méthodes des entités (gestion des utilisateurs, projets, tâches) sont des coquilles vides à compléter.
- **Aucun contrôleur ni route** — le projet n'expose actuellement aucune page ou API.
- **`var/cache/` ne devrait pas être versionné** — plusieurs centaines de fichiers de cache Symfony sont présents dans le dépôt ; à ajouter au `.gitignore` et à retirer de l'historique Git.
- **`.env` absent** — nécessaire pour que quiconope puisse cloner et lancer le projet.

## Prochaines étapes suggérées

1. Corriger les bugs de mapping Doctrine dans les entités.
2. Générer les contrôleurs et routes CRUD pour `Project` et `Task` (`php bin/console make:crud`).
3. Implémenter l'authentification (Symfony Security) pour distinguer Admin/Manager/User.
4. Ajouter un `.env.example` et nettoyer `var/cache/` du dépôt.
5. Ajouter des tests unitaires sur la logique métier une fois implémentée.

## Auteur & Contact

**Hamza Elrhadiouini**
Étudiant Ingénieur en Génie Logiciel (MIAGE) — EMSI Rabat

- GitHub : [@ELGHAD](https://github.com/ELGHAD)
- Portfolio : [elghad.github.io/hamza-elrhadiouini-portfolio](https://elghad.github.io/hamza-elrhadiouini-portfolio)
- Email : [hamelrhadiouini@gmail.com](mailto:hamelrhadiouini@gmail.com)
