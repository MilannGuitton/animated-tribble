<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        $len = strlen($s1);
        $res = false;
        $n = $len;
        while ($n > 0 && !$res) {
            $s1 = substr($s1, -1) . substr($s1, 0, $len - 1);
            if ($s1 == $s2) {
                $res = true;
            }
            $n--;
        }
        return $res;
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
