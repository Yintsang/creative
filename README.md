### Start Docker 

change container name in `docker-compose.yml` and `deploy/httpd.conf`

change httpd port number

`docker-compose up -d`


### Access Docker Container

`docker exec -it {fpm_name} bash`

---

### Create Application Key

`php artisan key:generate`

---

### Create Symbolic Link

`php artisan storage:link`

---

### Install node model

`npm install`

---

### Import mysql
Default mysql placed in 

`/build/mysql.sql`

---

### Add .env
Copy from .env.example and change the configs

---

### Development Link 

`http://127.0.0.1:{httpd_port_number}`
 Visit `http://127.0.0.1:{httpd_port_number}/admin/cms_demo/detail/1` to see available components
---

### Mac Problem
configure: error: Unable to detect ICU prefix or no failed. Please verify ICU install prefix and make sure icu-config works.

add: `g++`