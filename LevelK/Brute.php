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
		    $var = chr($i).chr($j).chr($k).chr($t)."<br>";      
		    $md5 = md5($var);
		    $crc32 = crc32($var);
		    $base64 = base64_encore($var);
		    $sha1 = sha1($var);

		    if ($hash === $md5) {
			$origin = $var;
		    }
		    if ($hash === $crc32) {
			$origin = $var;
		    }
 		    if ($hash === $base64) {
			$origin = $var;
		    }
		    if ($hash === $sha1) {
			$origin = $var;
		    }
		    print($var);
}
}
}
    }
}
