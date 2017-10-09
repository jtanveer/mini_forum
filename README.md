# Mini Forum
#### A minimal forum engine

## Setup Guide
Please follow the instructions given below to run the project on a local host environment

* Copy the MySql file from `<project-root>/sql` directory and import it to your MySql server. If you have imported the file correctly, you should be able to see some preloaded data.
* Configure your database connection in the project. Go to `<project-root>/app/Config/` directory and open `database.php` file. Update the following lines based on your database configuration
    ```php
    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => '127.0.0.1',
        'login' => 'root',
        'password' => '',
        'database' => 'mini_forum',
        'prefix' => '',
        //'encoding' => 'utf8',
    );
    ```
* Create a `tmp` directory inside `<project-root>/app` directory. Provide your server write permission to `tmp` directory if needed.
* To launch the project using native PHP server, first you have to determine if your url rewriting works or not. If yes, then go to `<project-root>/` directory. If no, then go to `<project-root>/app/webroot` directory and then run the following command
    ```
    php -S localhost:8080
    ```
    Please note that if you change the domain name to anything other than `localhost:8080`, the project will not work properly as there is domain dependancy to one of the components.
* Finally, open your web browser and go to http://localhost:8080

#### User Credentials
There are two types of users. One is **admin** and the other one is **author**. **admin** has full access (CRUD operations for all controllers) to the project, where **author** has limited access. Here are two sample user account credentials
```
username: admin
password: abc123

username: author1
password: abc123
```
That's pretty much it. If everything works well, you should be able to view and customize many things!