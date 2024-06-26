# BLOG READER

A simple Laravel bloggin website made for the purpose of training my student in the web development class.

## Things to note

This project is being commited to by the active students and may contain several branches.

[view project documentation](./docs/index.md)

## Contributors

1. [Ifeanyi Micheal](https://github.com/imcodes/)
2. [Ramadan](https://github.com/iamramadan/)

# How to launch the Project on your local machine

To download the project files on your computer , go to your git bash command line

and paste.


`git clone https://github.com/iamramadan/blogReader.git`

**Install laravel and other dependencies**

To install laravel and other dependencies paste the following command in your terminal.

`composer install`

**Configure the dotenv file**

create a new .env file , then copy the content of .env.example into the newly created .env file.

**Setup up your database connection**

In the dotenv file set the variable dbname to the name of your mySQL database

**Migrate the database models**

Type into the terminal the following command.

`php artisan migrate`

## Seeding data

**Seed data to the database**

If you want want to learn about Laravel, check out the [larave documentation](./laravel.md)
