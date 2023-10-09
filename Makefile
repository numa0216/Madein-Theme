up:
	docker compose up -d
stop:
	docker compose stop
down:
	docker compose down
restart:
	@make down
	@make up
ps:
	docker compose ps
logs:
	docker compose logs
npm:
	npm i
gulp: 
	npx gulp