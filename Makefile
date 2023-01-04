#migrations and fixtures
create-database:
	cd app && php bin/console doctrine:database:create
migrations-migrate:
	cd app && php bin/console --no-interaction  doctrine:migrations:migrate
migrations-create:
	cd app && php bin/console make:migration