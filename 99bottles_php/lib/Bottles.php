<?php

class Bottles
{
    public function verse( $number )
    {
        $number = (string) $number;
        $minusOne = (string) ($number - 1);

        return "{$number} bottles of beer on the wall, " .
            "{$number} bottles of beer.\n" .
            "Take one down and pass it around, " .
            "{$minusOne} bottles of beer on the wall.\n";
    }
}
