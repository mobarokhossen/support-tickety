[![Latest Version](https://img.shields.io/github/release/mobaroklab/support-tickety.svg)](https://github.com/mobaroklab/support-tickety/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/mobaroklab/support-tickety.svg)](https://packagist.org/packages/mobaroklab/support-tickety)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)

# Support Tickety

A Laravel package for managing support tickets.

## Features
* Create, view, update, and delete support tickets
* Assign tickets to users
* Track the status of tickets (open, closed, in-progress)
* Notifications for ticket updates
* Flexible and extendable

## Laravel Versions

Laravel | Support Tickety
--- | ---
5.6 - 10.x | 1.*

## Installation

### Step 1: Composer

You can install the package via composer:

```bash
composer require mobaroklab/support-tickety
```
```bash
"require": {
    "mobaroklab/support-tickety": "~1.0"
}
```
#### OR  place manually in composer.json:

```bash
"require": {
    "mobaroklab/support-tickety": "~1.0"
}
```
```bash
composer update
```
### Step 2: Service Provider
Add the service provider to config/app.php under providers:

```bash
php artisan vendor:publish --provider="MobarokLab\SupportTickety\SupportTicketServiceProvider"

```


#### OR  place manually

```bash
'providers' => [
    MobarokLab\SupportTickety\SupportTicketServiceProvider::class,
],
```