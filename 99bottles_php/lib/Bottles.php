<?php
#./vendor/bin/phpunit test

declare(strict_types = 1);

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

    public function quantity( int $number ) : string {
        return $number == 0 ? "no more" : (string) $number;
    }

    public function container( int $number ) : string {
        return $number == 1 ? "bottle" : "bottles";
    }

    public function pronoun( int $number ) : string {
        return $number == 1 ? "it" : "one";
    }

    public function action( int $number ) : string {
        return $number == 0 ? "Go to the store and buy some more" : "Take ". $this->pronoun( $number ) ." down and pass it around";
    }

    public function next( int $number ) : int {
        return $number == 0 ? 99 : $number - 1;
    }

    public function verse( int $number ): string {
        switch ($number) {
            case 0:
                return
                    ucfirst( $this->quantity( $number ) ) ." ". $this->container( $number ) ." of beer on the wall, " .
                    $this->quantity($number) . " " . $this->container($number) . " of beer.\n" .
                    $this->action($number) . ", " .
                    $this->quantity( $this->next( $number ) ) ." ". $this->container( $number - 1 ) ." of beer on the wall.\n";
            default:
                return
                    ucfirst( $this->quantity( $number ) ) ." ". $this->container( $number ) ." of beer on the wall, " .
                    $this->quantity($number) . " " . $this->container($number) . " of beer.\n" .
                    $this->action($number) . ", " .
                    $this->quantity( $this->next( $number ) ) ." ". $this->container( $number - 1 ) ." of beer on the wall.\n";
        }
    }
}
