# Task & Project Management — Symfony

A Symfony-based project exploring the domain model of a team task management system using Doctrine ORM, relational entities, and native PHP enums.

![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat&logo=php&logoColor=white)
![Symfony](https://img.shields.io/badge/Symfony-5.4-000000?style=flat&logo=symfony&logoColor=white)
![Doctrine](https://img.shields.io/badge/Doctrine-ORM-FC6A31?style=flat)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![Status](https://img.shields.io/badge/Status-Modeling%20Stage-orange?style=flat)
![License](https://img.shields.io/badge/License-Not%20specified-lightgrey?style=flat)

## Overview

This project establishes the initial domain model for a team-oriented task and project management application. It uses Symfony and Doctrine ORM to represent users, projects, tasks, and notifications, with typed enums for business states and priorities.

**Current status: early development — domain modeling only.** The repository primarily contains entities, enums, and generated repositories. The application does not yet provide complete CRUD workflows, authentication, authorization, or a functional user interface.

## Domain Model

The current model covers the following concepts:

- **User hierarchy:** a base `Utilisateur` entity with `Admin`, `Manager`, and `User` subtypes, designed around Doctrine's joined inheritance mapping.
- **Project management:** a `Project` entity with descriptive fields, a deadline, a status, and an associated collection of tasks.
- **Task management:** a `Task` entity with a description, deadline, status, priority, associated project, and assigned user.
- **Notifications:** a `Notification` entity associated with a user, intended as a foundation for future notification workflows.
- **Typed business values:** native PHP enums for user roles, project statuses, task statuses, and priorities.

These features describe the intended domain structure; the corresponding application workflows are not yet implemented.

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP 8.1+ | Backend language and native enums |
| Symfony 5.4 | Application framework |
| Doctrine ORM | Entity mapping and persistence |
| Doctrine Migrations | Database schema versioning |
| MySQL | Intended relational database |
| Twig | Base template structure |
| Symfony Maker Bundle | Initial entity and repository scaffolding |

## Architecture

The current codebase is organized around the domain model and persistence layer.

```text
Symfony Application
├── Domain Model
│   ├── Utilisateur
│   │   ├── Admin
│   │   ├── Manager
│   │   └── User
│   ├── Project
│   │   └── Task
│   └── Notification
├── Business Enums
│   ├── Role
│   ├── ProjectStatus
│   ├── TaskStatus
│   └── Priority
├── Doctrine Repositories
├── Database Migrations
└── Base Twig Template
```

The model is intended to connect users, projects, and tasks through Doctrine relationships. The inheritance mapping and entity associations still need validation before the project can be considered runnable.

## Project Structure

```text
gestionnaire-tache/
├── src/
│   ├── Entity/
│   │   ├── Utilisateur.php
│   │   ├── Admin.php
│   │   ├── Manager.php
│   │   ├── User.php
│   │   ├── Project.php
│   │   ├── Task.php
│   │   └── Notification.php
│   ├── Enum/
│   │   ├── Role.php
│   │   ├── ProjectStatus.php
│   │   ├── TaskStatus.php
│   │   └── Priority.php
│   ├── Repository/
│   └── Controller/
├── config/
├── migrations/
├── templates/
│   └── base.html.twig
└── composer.json
```

## Getting Started

### Prerequisites

- PHP 8.1 or later
- Composer
- MySQL
- Required PHP extensions for the installed Symfony and Doctrine packages

### Installation

Clone the repository and install its dependencies:

```bash
git clone https://github.com/ELGHAD/gestionnaire-tache.git
cd gestionnaire-tache
composer install
```

Configure the database connection in your local `.env` file. Use the repository's actual environment template if one exists; otherwise, create a local configuration based on Symfony's environment-variable conventions.

Example MySQL connection string:

```dotenv
DATABASE_URL="mysql://user:password@127.0.0.1:3306/gestionnaire_tache"
```

After validating the entity mappings and migration configuration, create the database and apply migrations:

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

To start the Symfony development server, if Symfony CLI is installed:

```bash
symfony server:start
```

**Important:** These steps are intended for local setup and schema validation. The repository does not currently implement complete application routes or workflows, and the entity mapping must be corrected and verified before successful database initialization can be expected.

## Engineering Concepts

This project provides a starting point for exploring:

- Domain modeling with PHP classes and Doctrine entities
- Object-oriented design and entity inheritance
- Relational associations between users, projects, and tasks
- Native PHP enums for representing constrained business values
- Repository-based persistence and database migrations
- The separation of domain data from future controllers and presentation logic

## Known Limitations

The repository is a work in progress and requires further implementation:

- Some entity accessor methods reference identifier properties that are not declared under those names.
- `Manager.php` and `User.php` may require missing Doctrine collection imports.
- Entity methods and business rules remain incomplete.
- Controllers, functional routes, authentication, and authorization are not yet implemented.
- Database configuration and environment setup need to be documented and verified.
- Generated cache files should not be committed; the Git history and `.gitignore` should be reviewed.

The project should not be considered production-ready.

## Planned Improvements

1. Correct entity mappings, identifiers, inheritance configuration, and collection initialization.
2. Validate the schema using Doctrine mapping checks and migrations.
3. Implement project and task CRUD workflows.
4. Add authentication and authorization with Symfony Security.
5. Enforce role-specific permissions for administrators, managers, and users.
6. Add automated tests for domain rules and persistence.
7. Provide an environment example file and clean repository configuration.
8. Add a functional interface and document setup with reproducible instructions.

## Author

**Hamza Elrhadiouini**  
Software Engineering

- GitHub: [@ELGHAD](https://github.com/ELGHAD)
- Portfolio: [elghad.github.io/hamza-elrhadiouini-portfolio](https://elghad.github.io/hamza-elrhadiouini-portfolio)
