# wazzinga

App for sending anonymous Whatsapp messages using a list of client nodes.

## Installing

- Install composer and other dependencies
- composer install
- php -S localhost:8000

## API endpoints

### GET /v1/code

| Parameter | Default | Description                               |
|-----------|---------|-------------------------------------------|
| number    | none    | Number where the code will be sent by SMS |

### GET /v1/register

| Parameter | Default | Description             |
|-----------|---------|-------------------------|
| number    | none    | Number to be registered |
| code      | none    | Code received by SMS    |

### POST /v1/send

| Parameter   | Default | Description        |
|-------------|---------|--------------------|
| destination | none    | Destination number |
| message     | none    | Message            |

### GET /v1/nodes

List of active nodes used to send messages

## Requirements

- php >=5.6
- ext-curl
- ext-gd
- ext-mcrypt
- ext-openssl
- ext-pdo
- ext-sockets
- ext-sqlite3

```bash
sudo apt-get install php5-curl php5-gd php5-mcrypt php5-sqlite
```

## Install composer

```bash
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

## Quick update to PHP 5.6 in Ubuntu/Mint

```bash
sudo apt-get install software-properties-common
sudo add-apt-repository ppa:ondrej/php5-5.6
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install php5
```
