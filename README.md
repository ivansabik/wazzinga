# wazzinga

HTTP API for sending anonymous Whatsapp messages using a list of client nodes, powered by the great php WhatsApp library [Chat API](https://github.com/WHAnonymous/Chat-API)

## How to use

1. Get a register code by SMS
2. Register your code and number
3. After getting a password from registration add a node into the file ```nodes.php```
4. Register and add more client nodes
5. Send messages

## API endpoints

- /v1/code?number=5215587162718
- /v1/register?code=519039&number=5215587162718
- /v1/send
- /v1/nodes

number: 52993177437
message: Howdie ho

### GET /v1/code

| Parameter | Default | Description                               |
|-----------|---------|-------------------------------------------|
| number    | none    | Number where the code will be sent by SMS |

GET http://localhost:8000/api.php/v1/code?number=5215587162718

```javascript
{
  "status": "sent",
  "length": 6,
  "method": "sms",
  "retry_after": 1805
}
```

### GET /v1/register

| Parameter | Default | Description             |
|-----------|---------|-------------------------|
| number    | none    | Number to be registered |
| code      | none    | Code received by SMS    |

GET http://localhost:8000/api.php/v1/register?code=519039&number=5215587162718

```javascript
{
  "status": "ok",
  "login": "5215546921938",
  "pw": "iwu9mSkhhobsutiwd56kelxG8fC=",
  "type": "new",
  "expiration": 1479444555,
  "kind": "free",
  "price": "$13.00",
  "cost": "13.00",
  "currency": "MXN",
  "price_expiration": 1450683705
}
```

### POST /v1/send

| Parameter   | Default | Description        |
|-------------|---------|--------------------|
| destination | none    | Destination number |
| message     | none    | Message            |

POST http://localhost:8000/api.php/v1/send

number: 52993177437
message: Howdie ho

```javascript
{
}
```

### GET /v1/nodes

Takes no paramenters, used to get a list of nodes and their status.

GET http://localhost:8000/api.php/v1/nodes

```javascript
{
}
```

## Requirements and quick installation

Chat API requires:

- php >=5.6
- ext-curl
- ext-gd
- ext-mcrypt
- ext-openssl
- ext-pdo
- ext-sockets
- ext-sqlite3

Additionally [Slim](https://github.com/slimphp/Slim) framework is used to provide the HTTP API.

Clone the repo:
```bash
$ git clone https://github.com/ivansabik/wazzinga.git
$ cd wazzinga
```

Install php dependencies (for a quick upgrade guide to php >=5.6 see below):

```bash
$ sudo apt-get install php5-curl php5-gd php5-mcrypt php5-sqlite
```

Install composer and the repo dependencies:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer
$ composer install
```
Start a local php server:

```bash
$ php -S localhost:8000
```

## Quick update to PHP 5.6 in Ubuntu/Mint

```bash
$ sudo apt-get install software-properties-common
$ sudo add-apt-repository ppa:ondrej/php5-5.6
$ sudo apt-get update
$ sudo apt-get upgrade
$ sudo apt-get install php5
```
