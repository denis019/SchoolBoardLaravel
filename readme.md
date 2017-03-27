# School Board Test
# Author: Denis Kovacevic
# Task
You have to design a system that is responsible for the managing the grades for a list of students. 
You should be able to calculate the average of the grades for a given student, identify if he has passed or failed and notify the school board of the results. 
Each school board can have a different rule to calculate if he has passed or not and which format (JSON, XML) it accepts each student notification.
Provide unit tests for the relevant parts of the system.

##### Notes:
A student is registered with only one school board.
A student can have 1 to 4 grades  
Don’t worry about UI of the list of students or grades. 
You can use SQLite if you want for the persistence  
Implement two school boards, CSM and CSMB 
CSM considers pass if the average is bigger or equal to 7 and fail otherwise.  
Accepts JSON format
CSMB discards the lowest grade, if you have more than 2 grades. Accepts XML format
The usage, at the higher level is expected to be as simple as this (initialization, error handling and actual names of the methods left as part of the exercise)

$average = $schoolSystem->methodThatCalculatesTheAverage(…);  
$schoolSystem->methodThatTransferTheStudentResult(…);

Each student result, either XML or JSON, will contain the student id, name, list of grades, average and final result (Fail, Pass)  
The school board is an external system so don’t worry about its actual implementation. For this example you can simply log what would be the result transmitted.  
The transmission can fail and your system should log this (standard output for simplicity)
Use Laravel 5.1+

# Installation
### Create .env, example .env
```sh
APP_ENV=local
APP_KEY=base64:wcAU8oO/FHOXbL4en1p9khpzzl+4qoaw/gRyhiHpL1c=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://mgtest.local

DB_CONNECTION=sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

BOARD_PASS_LIMIT=7
BOARD_REMOVE_LOWEST_LIMIT=2

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
```
### Create sqlite DB
```sh
    touch database/database.sqlite
```
### Set permissions for storage and cache folders
```sh
    sudo chmod -R 777 bootstrap/cache/
    sudo chmod -R 777 storage/
```
### Install dependencies and dump-autoload
```sh
    composer install
    composer dump-autoload
```
### DB migration
```sh
    php artisan migrate
```
### Seed database
```sh
php artisan db:seed
```

### API END POINTS
```sh
http://mgtest.local/api/board/CSMB/students
http://mgtest.local/api/board/CSM/students
http://mgtest.local/api/student/1
```
### TODO
####  - Unit test
####  - Error and Exception handling