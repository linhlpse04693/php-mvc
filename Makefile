build: ## build development environment
	cp .env.example .env
	docker-compose build
install:
	docker-compose run --rm php composer install
	docker-compose run --rm npm install
build-js:
    docker-compose run --rm npx mix --production
serve:
	docker-compose up -d
stop:
	docker-compose stop
down:
	docker-compose down -v