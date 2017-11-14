 ## Local Development

- `app-context` contains our [Laravel](https://laravel.com/)  application
- `docker-context`: contains files that [docker-compose](https://docs.docker.com/compose/) will utilize to give us identical development environments (Nginx, MySQL, PHP)

### Pre-reqs: 
- [git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
- [docker](https://docs.docker.com/engine/installation/)

### Initial Setup:
- `git clone https://github.com/scottx611x/csci-e71-term-project.git && cd csci-e71-term-project`
- `cp app-context/.env.example app-context/.env`
- `cd app-context`
- Windows: in Docker Settings > Shared Drives, mark the drive letter you're running the container in as "shared".
- `docker run --rm -v $(pwd):/app composer/composer install --no-interaction --prefer-source` # PowerShell: ${PWD}
- `cd ..`
- `docker-compose up -d` # This step will take awhile the first time around
- `docker-compose exec -T app php artisan key:generate`
- `docker-compose exec -T app php artisan optimize`

### Running the app:
- `docker-compose up`
- Go to: http://localhost:8888

### Shutting down:
 - `ctrl+c`
 - `docker-compose down`

### Running Tests:
- `docker-compose exec -T app vendor/bin/phpunit`

### Continuous Integration:
- We use [Travis CI](https://travis-ci.org/scottx611x/csci-e71-term-project)

### Code Coverage:
- We use [Codecov](https://codecov.io/gh/scottx611x/csci-e71-term-project) 