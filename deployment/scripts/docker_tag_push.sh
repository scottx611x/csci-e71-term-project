docker login -u $DOCKER_USER -p $DOCKER_PASS

tag=""

if [ $# -eq 0 ]; then
    tag="latest"
else
    tag="aws"
fi

echo "Tagging with: $tag..."

docker tag cscie71termproject_app scottx611x/cscie71termproject_app:$tag
docker tag cscie71termproject_web scottx611x/cscie71termproject_web:$tag
docker push scottx611x/cscie71termproject_app:$tag
docker push scottx611x/cscie71termproject_web:$tag
