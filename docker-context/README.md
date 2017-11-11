### Local Development

### Pre-reqs: 
- [docker](https://docs.docker.com/engine/installation/)

### Running the app:
- `git clone https://github.com/scottx611x/csci-e71-term-project.git && cd csci-e71-term-project`
- `cd docker-context`
- `docker compose up`
- `docker-compose exec -T app php artisan key:generate`
- `docker-compose exec -T app php artisan optimize`
- Go to: http://localhost:8888

### Running Tests:
- `docker-compose exec -T app vendor/bin/phpunit`