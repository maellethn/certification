# Symfony Certification Quiz Site

Bienvenue sur le projet **Symfony Certification Quiz Site** ! Ce site web est conçu pour aider les développeurs à se préparer à la certification Symfony en proposant des quiz et des examens blancs sur différents aspects du framework Symfony.

## Objectif du Projet

L'objectif principal de ce projet est de fournir une plateforme éducative permettant aux utilisateurs de tester leurs connaissances sur Symfony à travers des questions à choix multiples. Les utilisateurs peuvent s'inscrire, participer à des quiz, créer leurs propres questions, et passer des examens blancs pour évaluer leur préparation.

## Fonctionnalités Principales

- **Gestion des Utilisateurs** : Inscription, connexion, déconnexion, et profil utilisateur.
- **Création et Gestion des Quiz** : Créer, modifier et supprimer des quiz et des questions à choix multiples.
- **Participation aux Quiz** : Répondre aux quiz, calcul des scores, et révision des réponses.
- **Examens Blancs** : Génération d'examens blancs chronométrés avec stockage des résultats.
- **Recherche et Filtrage** : Recherche de quiz et filtrage par catégories et tags.
- **Feedback et Commentaires** : Laisser des commentaires et des feedbacks sur les questions pour améliorer le contenu.

## Technologies Utilisées

- **Langage** : PHP
- **Framework** : Symfony
- **Base de données** : MySQL
- **Front-end** : HTML, CSS, JavaScript
- **Gestion des dépendances** : Composer
- **Tests** : PHPUnit

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/maellethn/certification.git
   
2. Installer les dépendances symfony via composer
   ```bash
   composer install
   
3. Installer les dépendances du theme via node
   ```bash
   npm install
   
4. Compiler le theme
   ```bash
   npm run watch
   
## Lancer les tests en local

1. Créer la bdd de test

   ```bash
      php bin/console doctrine:database:create --env=test
   ```
   ```bash
      php bin/console doctrine:migrations:migrate --env=test