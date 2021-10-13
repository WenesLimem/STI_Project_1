docker kill Sti_project
docker rm Sti_project

# pull and run a container named "Sti_project"
docker run -ti -v "/$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name Sti_project --hostname sti arubinst/sti:project2018
# run the web and PHP servers
docker exec -u root Sti_project service nginx start
docker exec -u root Sti_project service php5-fpm start
