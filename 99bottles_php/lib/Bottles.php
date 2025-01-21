<?php
#./vendor/bin/phpunit test

class Bottles
{
    private $start = 99;
    private $finish = 0;

    public function song() : string {
        return $this->verses( $this->start, $this->finish );
    }

    public function verses( int $start, int $finish ) : string {
        return 
            implode( 
                "\n",
                array_map( 
                    function( $number ) {
                        return $this->verse( $number );
                    },
                    range( $start, $finish ) 
                )
            );
    }

    public function container( int $number ) : string {
        return $number == 1 ? "bottle" : "bottles";
    }

    public function verse( int $number ): string {
        switch ($number) {
            case 0:
                return
                    "No more bottles of beer on the wall, " .
                    "no more bottles of beer.\n" .
                    "Go to the store and buy some more, " .
                    "99 bottles of beer on the wall.\n";
            case 1:
                return
                    "1 bottle of beer on the wall, " .
                    "1 bottle of beer.\n" .
                    "Take it down and pass it around, " .
                    "no more bottles of beer on the wall.\n";
            default:
                return
                    $number ." ". $this->container( $number ) ." of beer on the wall, " .
                    $number ." ". $this->container( $number ) ." of beer.\n" .
                    "Take one down and pass it around, " .
                    ($number - 1) . " ". $this->container( $number - 1 ) ." of beer on the wall.\n";
        }
    }
}
