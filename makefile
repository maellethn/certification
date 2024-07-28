DOCKER_COMP = docker-compose
DOCKER = docker

# Docker containers
PHP_CONT = $(DOCKER) exec -it www_certification bash

# Executables
PHP      = $(PHP_CONT) php
COMPOSER = $(PHP_CONT) composer
SYMFONY  = $(PHP_CONT) bin/console

up:
	@$(DOCKER_COMP) up -d

down:
	@$(DOCKER_COMP) down --remove-orphans

