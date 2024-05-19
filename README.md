<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Bitcoin Tracker V2

Bitcoin Tracker V2 is a Laravel-based application that tracks Bitcoin prices and sends email alerts when certain conditions are met. This project leverages Laravel's task scheduling and caching capabilities to monitor Bitcoin price changes and notify users.

## Features

- Fetches the latest Bitcoin prices from the Binance API.
- Sends email alerts if the Bitcoin price changes by more than 10%.
- Shows transactionhistory.
- Makes it possible to buy and sell bitcoins.
- Ensures emails are sent no more than once per hour.
- Simple and user-friendly interface for tracking Bitcoin prices.

## Requirements

- PHP >= 7.4
- Composer
- Laravel 8 or later
- MySQL or another supported database
- An SMTP server for sending emails

## Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/Ciisse/bitcoin-trackerV2.git
   cd bitcoin-trackerV2

2. **Install dependencies:**
    composer install

3. **ENV file**
    Update the .env filee with your database and mail server details

4. **Generate an application key:**
    php artisan key:generate

5. **Run the migrations:**
    php artisan migrate

## Usage
To start tracking Bitcoin prices and receive alerts:

1. **Start the Laravel development server:**
    php artisan serve
    npm run dev 
