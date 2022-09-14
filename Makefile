# vim: set tabstop=8 softtabstop=8 noexpandtab:

.PHONY: run
run:
	@if [ ! -e ".env.example" ]; then\
		cp .env .env.example; \
	fi
	@docker-compose up -d
	@echo "Service is running on http://localhost:8080"

.PHONY: install
install:
	@docker-compose exec app composer install

.PHONY: migrate
migration:
	@docker-compose exec app vendor/bin/phinx migrate

.PHONY: stop
stop:
	@docker-compose stop

.PHONY: enter
enter-as-root:
	@docker-compose exec  app /bin/sh
