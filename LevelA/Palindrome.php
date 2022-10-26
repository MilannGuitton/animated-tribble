<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        $chars = mb_str_split($this->str, 1, "UTF-8" ?: mb_internal_encoding());
        $output = implode('', array_reverse($chars));
        return $this->str . $output;
    }
}