# BiCrypt Utility Class

This class is very simple and is used for utility. Two public methos are avalaible for
encrypting and decrypting strings.


## Storing in a database

The initialisation vector and the encrypted string are both binary values. This means you will need to
store them as such. In MySQL you can do this by making the column type `BINARY` or `VARBINARY`. If this
is not an option, you can [encode](http://us3.php.net/manual/en/function.base64-encode.php) (`base64_encode`) and [decode](http://us3.php.net/manual/en/function.base64-decode.php) ('base64_decode) the iv and encrypted
string going and coming from the db. [bin2hex](http://us1.php.net/bin2hex) is also an option.

## Todo

* Add support for different Agorithm and Modes.
* Add support for base64 or hex vi and encrpted strings
  
 
I would like to thank Jack from stackoverflow
http://stackoverflow.com/questions/10916284/how-to-encrypt-decrypt-data-in-php