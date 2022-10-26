<?php

namespace Hackathon\LevelO;

class FastRandom
{
    private $numberOfInteger;

    public function __construct($numberOfInteger)
    {
        $this->numberOfInteger = $numberOfInteger;
    }

    /**
     * Cette fonction retourne une liste d'integer unique et aléatoires.
     * Cette fonction doit être 20% plus rapide que laRef.
     *
     * @return array
     */
    public function generateRandomNumbers()
    {
        $numbers = range(1, $this->numberOfInteger);
        shuffle($numbers);
        return array_slice($numbers, 0, $this->numberOfInteger);
    }


    /**
     * Cette methode est la réference, à vous de la battre
     *
     * @return mixed
     */
    public function generateRandomNumbersLaRef()
    {
        $res = array();

        while (count($res) < $this->numberOfInteger){ 
            $x = rand (1, $this->numberOfInteger);
            if (!(in_array($x, $res)))
                array_push($res, $x);

        }

        return $res;
    }
};
