<p align="center"><a href="" ><img src="public/img/ZenbreakLogo.png" width="400" alt="Zembreak Logo"></a></p>



## About Zembreak

Zembreak is a web application with api configuration , . We believe development must be an enjoyable and creative experience to be truly fulfilling. You use the system to integrate it with front-end, such as:

- [Nuxtjs framework ](https://nuxt.com/).
- [Nextjs framework ](https://nextjs.org/).
- [Vuejs framework ](https://vuejs.org/).


Zembreak is accessible, powerful, and provides tools required for robust applications.

## Install Zembreak

# Initial Setup

## 1. Clone the repository
Find a location on your computer where you want to store the project(www is recommended). A directory made for projects is generally a good choice.

Launch a bash console there and clone the project.

`git clone https://github.com/maassikll/Agency-Laravel-Sanctum.git`

## 2. cd into the project
You will need to be inside the project directory that was just created, so cd into it.


`cd Agency-Laravel-Sanctum`

## 3. Install composer dependencies
Whenever you clone a new Laravel project you must install all of the project dependencies.

`composer install`

## 4. Install NPM dependencies
Similarly to composer, npm manages javascript, css, and node packages, so make sure to install those dependencies also.

`npm install`

## 5. Copy the .env file
.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project requires.

So you should make a copy of the .env.example file and name it .env so that you can setup your local deployment configuration in the next few steps.

`cp .env.example .env`

## 6. Generate an app encryption key
Laravel requires you to have an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.

`php artisan key:generate`

## 7. Create an empty database for the application
Create an empty database for your project using the database tools you prefer (phpmyadmin, datagrip, or any other mysql client).

## 8. In the .env file, add database information to allow Laravel to connect to the database
You will want to allow Laravel to connect to the database that you just created in the previous step. To do this, you must add the connection credentials in the .env file and Laravel will handle the connection from there.


## 10. Migrate the database
Once your credentials are in the .env file, now you can migrate your database. This will create all the necessary tables in your database.

`php artisan migrate`


# During Development

## Compiling assets
To compile all sass and js assets using webpack, run the following command.

`npm run dev`

## Local development server
To run a local development server you may run the following command. This will start a development server at **http://localhost:8000**.

`php artisan serve`





## Contributing




## Security Vulnerabilities

If you discover a security vulnerability within Zembreak Agency project, please send an e-mail to MgSnake via [maassi.kloull@gmail.com](mailto:maassi.kloull@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Zembreak  is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
