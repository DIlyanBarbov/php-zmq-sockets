To install:
run composer install inside folder
start web/file-server.php using php built-in web server
start the main application using 'php yii serve'
php 7.2 or newer required to run







Overview:
1. Application creates a new Req ZMQSocket and connects to a Rep ZMQSocket that is binded to port 5555.
2. Sends the json encoded data
3. Server at port 5555 receives and decodes the data then checks if a record exists.
4. After checking it returns a response to the client.
5. Client gets notified if requested data exists or not.

https://zguide.zeromq.org/
Possible extensions:
1. Creating a new file
2. Active hash and dehash for md5 and sha512
3. Using certification to protect from network attacks.
