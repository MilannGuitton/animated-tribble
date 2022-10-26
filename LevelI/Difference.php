<?php

namespace Hackathon\LevelI;

/**
 * Class Difference
 */
class Difference
{
    private $a;     // Chaine A
    private $b;     // Chaine A
    public $cost;   // Coût de changement

    /**
     * @param $a    // Chaine A
     * @param $b    // Chaine B
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->cost = $this->whatIsTheCostPlease($a, $b);
    }

    /**
     * @param $this->a
     * @param $this->b
     *
     * @return mixed
     */
    public function whatIsTheCostPlease()
    {
        $a = $this->a;
        $b = $this->b;
        $n = strlen($a);
        $m = strlen($b);
        $d = array();
        for ($i = 0; $i <= $n; $i++) {
            $d[$i] = array();
            $d[$i][0] = $i;
        }
        for ($j = 0; $j <= $m; $j++) {
            $d[0][$j] = $j;
        }
        for ($j = 1; $j <= $m; $j++) {
            for ($i = 1; $i <= $n; $i++) {
                if ($a[$i - 1] == $b[$j - 1]) {
                    $cost = 0;
                } else {
                    $cost = 1;
                }
                $d[$i][$j] = min($d[$i - 1][$j] + 1, $d[$i][$j - 1] + 1, $d[$i - 1][$j - 1] + $cost);
            }
        }
        return $d[$n][$m];
    }
}
