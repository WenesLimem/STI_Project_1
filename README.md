# STI_Project_1

A simple chat app using : 
  - PHP    : web language
  - SQLite : database 
  - nginx  : app server 
# Intro 
  This project is developed under the course STI. It's the cornerstone to discover vulnerabilities in old versions of php.
  It, therefore, consists to develop a very simple web application that allows users, as part of a business, to send text messages between collaborators.
# Main features 
   The application has two types of users : **admin** & **collaborator** 
      - Admin: 
          - CRUD users
          - CRD messages. 
      - Users:
          - RU users 
          - CR messages
 # START & STOP 
    __start.sh__ : a script that creates a container from the image arubinst.It binds the container port 80 to the host port 8080. Also , it binds the volume containing the app to nginx folder. 
      
    # stop.sh 
                 a script taht stops and removes the container.

 # Users  : 
      - admin@world.org | admin 
      - user1@world.org | user1 
