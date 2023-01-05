DOCKER_DIR = docker
COMPOSE_DEV = docker-compose  -f   docker-compose.dev.yml

DOCKER_RUN = cd ${DOCKER_DIR} && ${COMPOSE_DEV} run php
DOCKER_EXEC = docker exec -i oniad-order-system-php bash -c

#aux dev
sh:
	docker exec -it oniad-order-system-php /bin/bash

#dev
build-dev:
	cd ${DOCKER_DIR} && ${COMPOSE_DEV} build
up-dev:
	cd ${DOCKER_DIR} && ${COMPOSE_DEV} up --build -d

deploy-dev:	build-dev up-dev composer-install migrations-migrate cache-clear

#migrations and fixtures
create-database:
	${DOCKER_EXEC} "cd app && php bin/console doctrine:database:create"
migrations-migrate:
	${DOCKER_EXEC} "cd app && php bin/console --no-interaction  doctrine:migrations:migrate"
migrations-create:
	${DOCKER_EXEC} "cd app && php bin/console make:migration"

#entities
entity-create:
	${DOCKER_EXEC} "cd app && php bin/console make:entity"