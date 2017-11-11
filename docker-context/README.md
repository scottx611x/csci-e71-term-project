### Local Development

### Pre-reqs: 
- [docker](https://docs.docker.com/engine/installation/)

### Running the app:
- `git clone https://github.com/scottx611x/csci-e71-term-project.git && cd csci-e71-term-project`
- `cp app-context/.env.example app-context/.env`
- `docker-compose exec -T app php artisan key:generate`
- `docker-compose exec -T app php artisan optimize`
- `docker-compose up`
- Go to: http://localhost:8888

### Running Tests:
- `docker-compose exec -T app vendor/bin/phpunit`