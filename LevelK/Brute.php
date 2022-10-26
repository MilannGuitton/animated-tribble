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
    for ($i=65; $i<=90; $i++) { 
	for ($j=65; $j<=90; $j++) {     
	    for ($k=65; $k<=90; $k++) {     
		for ($t=65; $t<=90; $t++) {     
		    $var = chr($i).chr($j).chr($k).chr($t);      
		    $md5 = md5($var);
		    $crc32 = crc32($var);
		    $base64 = base64_encode($var);
		    $sha1 = sha1($var);
		    
		    print($this->origin."\n");

		    if (strcmp($md5, '585adf88cdd3693831b0748f409ce846') === 0) {
			$this->origin = "toto";
		    }
		    print($this->origin);

		    if (strcmp($this->hash, $md5) === 0) {
			$this->origin = $var;
			print("-------md5");
			break;
		    } elseif (strcmp($this->hash, $crc32) === 0) {
			$this->origin = $var;
			print("-------crc32");
			break;
		    } elseif (strcmp($this->hash, $base64) === 0) {
			$this->origin = $var;
			print("-------base64");
			break;
		    } elseif (strcmp($this->hash, $sha1) === 0) {
			$this->origin = $var;
			print("-------sha1");
			break;
		    } else {
			//print("-------nothing found");
		    }
		    }
		}
	    }
	}
    }
}
