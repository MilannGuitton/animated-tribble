<?php

namespace Hackathon\LevelB;

class MyMatrix
{
    private $iMax;
    private $jMax;
    private $matrix = array();

    public function __construct($i, $j, $value = null)
    {
        $this->iMax = $i;
        $this->jMax = $j;

        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                $this->matrix[$i][$j] = $value;
            }
        }
    }

    /**
     * This function generate a Matrix[i][j] from a String
     *
     * @param $str
     * @return $this
     * @throws \Exception
     */
    public function str2Matrix($str)
    {
        $lines = explode("\n", $str);
        if ($this->iMax !== count($lines)) {
            throw new \Exception();
        }

        foreach ($lines as $i => $line) {
            $cells = explode(',', $line);
            if ($this->jMax !== count($cells)) {
                throw new \Exception();
            }
            foreach ($cells as $j => $value) {
                $this->matrix[$i][$j] = trim($value);
            }
        }

        return $this;
    }

    /**
     * This function generates a string from the $matrix and displays it (if mode == 'cli')
     *
     * @param null $mode
     * @return string
     */
    public function prettyMatrix($mode = null)
    {
        $res = '';
        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                $val = '-';
                if (!is_null($this->matrix[$i][$j])) {
                    $val = $this->matrix[$i][$j];
                }
                $res .= $val."\t";
            }
            $res .= "\n";
        }

        if ('cli' === $mode) {
            echo $res;
        }

        return $res;
    }

    /**
     * This function replaces a column (i) and a line (j) with '0',
     * if the (i, j) cell equals to '0'
     *
     * @TODO
     * @return $this
     */
    public function fillZero()
    {
        /** @TODO */
	$coordinatelist_i = array();
	$coordinatelist_j = array();
        for ($i = 0; $i <= $this->iMax; ++$i) {
            for ($j = 0; $j <= $this->jMax; ++$j) {
		array_push($coordinatelist_i, $i);
		array_push($coordinatelist_j, $j);
	    }
	}

	for ($k = 0; $k < count($coordinatelist_i); ++$k) {
            for ($j = 0; $j <= $this->jMax; ++$j) {
		$this->matrix[$coordinatelist_i[$k]][$j] = 0;
	    }
            for ($i = 0; $i <= $this->jMax; ++$i) {
		$this->matrix[$i][$coordinatelist_j[$k]] = 0;
	    }
	}
        return $this;
    }
}
