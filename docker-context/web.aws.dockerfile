FROM scottx611x/cscie71termproject_web:latest

RUN echo "upstream app {server 127.0.0.1:80;}" >>  /etc/nginx/conf.d/default.conf