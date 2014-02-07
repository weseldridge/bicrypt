<?php
/**
* This class is built as a utility class. Its sole propuse is to assiste
* in encrypting and decrypting strings. You have two public methods that
* take a string as its parameters. 
*
* I user a stackover atricle to help write this.
* @see @see http://stackoverflow.com/questions/10916284/how-to-encrypt-decrypt-data-in-php How to encrypt/decrypt data in php?
* 
* @author Wesley Eldridge <weseldridge@gmail.com>
* @version 1.0
* @license MIT
* @method array encrypt($item)
* @method string decrypt($item, $iv, $key)
*/
class BiCrypt {

	
	function __construct()
	{

	}

	/**
	* This methdo generates an entryption key
	*
	* We first get the key size of the MCRYPT_RIJNDAEL_128 algorithm by calling
	* mcrypt_get_key_size($cipher, $mode). This will return the maximum supported
	* key size for the given algorithm. We will then generate a pseduo random
	* string of bytes by calling openssl_random_pseudo_bytes($length, $crypto_strong).
	* This will return false or the desired string. We then check to make sure we
	* generated the key and that it is strong.
	*
	* @param void
	* @return string A pseudo-random string of bytes	
	*/
	private function generate_key($cipher, $mode)
	{
		$size = mcrypt_get_key_size($cipher, $mode);
		$key = openssl_random_pseudo_bytes($size, $strong);

		if(($key == false) || ($strong == false))
		{
			echo "The generation process failed or the key is not strong";
			exit;
		}

		return $key;
	}

	/**
	* Generates a IV using a pseudo-random initialization vector
	*
	* This method first gets the iv size for a particular engryption
	* algorithm. Then we create the iv using a php function.
	*
	* @param void
	* @return binary an initialization vector (IV)
	*/
	private function generate_initialisation_vector($cipher, $mode)
	{
		$size = mcrypt_get_iv_size($cipher, $mode);
		$iv = mcrypt_create_iv($size, MCRYPT_DEV_URANDOM);
		return $iv; 

	}

	/**
	* Will create an encypted string
	*
	* This method will create the key, iv, and encrypted string. This process is expected 
	*
	* @param string $item The password or item you want to encrypt
	* @return array An array includeding the the encryption key, the iv, and the encrypted item
	*/
	public function encrypt($item, $cipher=MCRYPT_RIJNDAEL_128, $mode=MCRYPT_MODE_CFB)
	{
		$key = $this->generate_key($cipher, $mode);
		$iv = $this->generate_initialisation_vector($cipher, $mode);
		$encrypted_item = mcrypt_encrypt($cipher, $key, $item, $mode, $iv);

		return array(
			'key' => $key,
			'iv' => $iv,
			'data' => $encrypted_item
			);
	}

	/**
	* This method is used to decrypt a string.
	*
	* We do not do anything exciting here. Just a call to a php function loaded with
	* a few predefined params and the passed in values as params.
	*
	* @param string $item An enctryed string
	* @param binary $iv initialization vector
	* @param string $key A string contianing the encryption key for $item
	* @return string The decrypted $item
	*/
	public function decrypt($item, $iv, $key, $cipher=MCRYPT_RIJNDAEL_128, $mode=MCRYPT_MODE_CFB)
	{
		return mcrypt_decrypt($cipher, $key, $item, $mode, $iv);
	}
}