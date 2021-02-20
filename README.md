# Bowling Score Calculator

This is a PHP exercise that calculates bowling scores that takes frames from an API endpoint and sends the calculated sum back to the API.

### Requirements
- PHP 7.4
- Composer

### Setup

- Clone this repository
- Run `composer install`

### Running the application

Running the index of this application in the browser should give you the expected result:

### Expected output
```
Frames received: [[2,1],[9,0],[9,1],[3,6],[3,7],[9,1],[6,4],[4,1],[3,6]]
Calculated sum: [3,12,25,34,53,69,83,88,97]
Request sent
```

### Running with Xampp (Local Server)

- Run local apache server
- Clone the application inside htdocs
- Run `composer install`
- Go to `http://localhost/bowling-calculator-php/`