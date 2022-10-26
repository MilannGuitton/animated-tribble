<?php

namespace Hackathon\LevelE;

class MaxiInteger
{
    private $value;
    private $reverse;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @FIX : CAN BE UPDATED
     *
     * @param MaxiInteger $other
     * @return $this|MaxiInteger
     */
    public function add(MaxiInteger $other)
    {
        if (is_null($other)) {
            return $this;
        }

        /**
         * You can delete this part of the code
         */
        $maxLength = max(strlen($this->getValue()), strlen($other->getValue()));
        if ($maxLength) {
            $other = $other->fillWithZero($maxLength);
            $this->setValue($this->fillWithZero($maxLength)->getValue());
        }

        return $this->realSum($this, $other);
    }

    /**
     * @TODO
     *
     * @param MaxiInteger $a
     * @param MaxiInteger $b
     * @return MaxiInteger
     */
    private function realSum($a, $b)
    {
        $a = strrev($a->getValue());
        $b = strrev($b->getValue());

        $c = strlen(max($a, $b));

        $arr = array_fill(0, $c + 1, 0);

        for ($i = 0; $i < $c; $i++) {
            $sum = $a[$i] + $b[$i] + $arr[$i];
            if ($sum > 9) {
                $arr[$i] = $sum - 10;
                $arr[$i + 1] = $arr[$i + 1] + 1;
            } else {
                $arr[$i] = $sum;
            }
        }
        $result = strrev(implode('', $arr));

        if ($result[0] == 0) {
            $result = substr($result, 1);
        }
        return new MaxiInteger($result);
    }

    private function setValue($value)
    {
        $this->value = $value;
        $this->reverse = $this->createReverseValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    private function getNthOfMaxiInteger($n)
    {
        return $this->value[$n];
    }
    private function createReverseValue($value)
    {
        return strrev($value);
    }

    private function fillWithZero($totalLength)
    {
        return new self(strrev(str_pad($this->reverse, $totalLength, '0')));
    }
}
