<?php

namespace Hackathon\LevelK;

class Brute
{
    private $hash;
    public $origin;
    private $method; // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
	$this->origin = "0";
    for ($i=97; $i<=122; $i++) { 
	for ($j=97; $j<=122; $j++) {     
	    for ($k=97; $k<=122; $k++) {     
		for ($t=97; $t<=122; $t++) {     
		    $var = chr($i).chr($j).chr($k).chr($t);      
		    $md5 = md5($var);
		    $crc32 = crc32($var);
		    $base64 = base64_encode($var);
		    $sha1 = sha1($var);
		    


		    if (strcmp($this->hash, $md5) === 0) {
			$this->origin = $var;
			print("-------md5");
		    } 
		    
		    if (strcmp($this->hash, $crc32) === 0) {
			$this->origin = $var;
			print("-------crc32");
		    } 

		    if (strcmp($this->hash, $base64) === 0) {
			$this->origin = $var;
			print("-------base64");
		    }

		    if (strcmp($this->hash, $sha1) === 0) {
			$this->origin = $var;
			print("-------sha1");
		    }		    
		}
	    }
	}
    }
    }
}
