
setup:
	@echo "*** Setup App***"
	curl -sS https://getcomposer.org/installer | php
	find ./storage/ -type d -print | xargs chmod 777
	docker-compose build
	docker-compose up -d
temp:
	@echo "*** Start Docker ***"
	find ./storage/ -type d -print | xargs chmod 777
start:
	@echo "*** Start Docker ***"
	docker-compose up -d
stop:
	@echo "*** Stop Docker ***"
	docker-compose stop
