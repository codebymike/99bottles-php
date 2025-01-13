<?php

class Bottles
{
    public function verse( $number )
    {
        $number = (string) $number;
        $minusOne = (string) ($number - 1);

        $lastContainer = $minusOne == 1 ? 'bottle' : 'bottles';

        return "{$number} bottles of beer on the wall, " .
            "{$number} bottles of beer.\n" .
            "Take one down and pass it around, " .
            "{$minusOne} {$lastContainer} of beer on the wall.\n";
    }
}
