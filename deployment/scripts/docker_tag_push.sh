docker login -u $DOCKER_USER -p $DOCKER_PASS
docker tag cscie71termproject_app scottx611x/cscie71termproject_app:latest
docker tag cscie71termproject_web scottx611x/cscie71termproject_web:latest
docker push scottx611x/cscie71termproject_app:latest
docker push scottx611x/cscie71termproject_web:latest