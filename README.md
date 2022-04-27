# Full stack demo

## Office tool registry (demo) application

### Install application with docker:

```bash
    1. Clone git repository with 'git clone https://github.com/bitbuster-hu/Full-stack-demo.git'
    2. Change to the new directory 'cd Full-stack-demo'
    3. Run 'docker-compose build --no-cache' to build all the docker containers.
    4. Run 'docker-compose up -d' to to start all the containers.
    5. Run 'docker exec full-stack-demo_php_1 sh -c "composer update"' to install all composer modules.
```


### Create database:

Now you can visit [http://localhost:8080](http://localhost:8080) to see adminer page, and here you can create new "test" database with adminer. (user: root, password: default)


```bash
Optionally use 'docker exec -it full-stack-demo_db_1 sh -c "mysql -u root -p"' command with password "default" and use "CREATE DATABASE test;" command in mysql console.
```


### Generate initial dataset:

Simply visit [http://localhost/init.php](http://localhost/init.php) url to generate initial dataset.


```bash
Optionally use 'docker exec -it full-stack-demo_php_1 sh -c "php init.php"'
```



### Available endpoints:

```bash
    http://localhost/init.php  | generate initial dataset

    http://localhost/index.php | react tool listing page

    http://localhost/tools.php | json response

    http://localhost/from.php  | simulate form post
```

### Get tool list output in console from container:

```bash
docker exec -it full-stack-demo_php_1 sh -c "php tools.php"
```

### Run tests in docker container:

```bash
docker exec -it full-stack-demo_php_1 sh -c "vendor/bin/phpunit ./tests/"
```

**Important Note**: Docker containers use default http and mysql ports (80, 3306) which may conflict with the default services
