# Laravel Blog CRUD

## About

This project was built with [Laravel](https://laravel.com) version v6.16.0

## Requirements

* PHP >= 7.2
* Mysql
* NodeJS with Yarn package manager


## Features

### Core features
- [x] Everyone could see list of posts and check their detail
- [x] People could register for new account and login/logout to the system
- [x] Registered users could CRUD their posts.
- [x] Posts’ body understand markdown syntax and could render properly
- [x] Admin could see a list of created posts
- [x] Admin could publish or unpublish created posts

### Optional features
- [x] Only published posts would be display in public listing page
- [x] Admin could see highlighting unpublished posts in list of all posts
- [ ] Admin could filter/order posts by date or status
- [ ] Admin could schedule post publishing. E.g I want publish this post automatically in tomorrow 9AM


## Setup

Run `make setup` to install all components, add some data for testing.

Available commands:

```bash
    make composer_install # install composer
    make db_migrate # run database migrations
    make db_seed # add some testing data
    make storage_link # storage:link 
    make optimze # optimize:clear
    make yarn_install # install nodejs packages
    make yarn_build # build assets based on laravel mix
    make run # run a local dev server
```

## Test

User credential: `user@simple-blog.com/secret`

Admin credential: `admin@simple-blog.com/admin`
