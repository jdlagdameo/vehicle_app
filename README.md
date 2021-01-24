# Vehicle App

### Database Setup

Change the .development.env to .env and set the database credentials.

```sh
DB_HOST=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

After the setup of the config, create database and export the api\src\database\schema\Vehicle.sql to the database using phpmyadmin.

### Project Setup

Pull the project in server. (Ex: for xampp pull the project in htdocs)

### API Setup

Go to terminal and access the /api folder. Install the library dependencies via

```sh
composer install
```

### Front End Setup

Go to terminal and access the /frontend folder. Install the library dependencies via

```sh
npm install
```

Access frontend\vue.config.js and change the project url.

```sh
publicPath: 'http:<enter project_url>/frontend/dist/'
```

To run the vue production build, run

```sh
npm run build
```

### Requirements

The following libraries and frameworks used in the project list down below:

| Library/Framework |
| ----------------- |
| PHP 7.4 and above |

### Libraries and Frameworks used

The following libraries and frameworks used in the project list down below:

| Library/Framework |
| ----------------- |
| VueJS             |
| Booststrap        |
| Vue Booststrap    |
| Axios             |
| Vue Axios         |
| Dotenv            |
