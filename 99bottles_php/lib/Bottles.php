<?php
#./vendor/bin/phpunit test

declare(strict_types = 1);

class Bottles
{
    private $start = 99;
    private $finish = 0;

    public function bottleNumberFor( int $number ) : BottleNumber {
        if( $number == 0 ) {
            $className = BottleNumber0::class;
        } else {
            $className = BottleNumber::class;
        }
        return new $className($number);
    }

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

    public function verse( int $number ): string {

        $bottleNumber = $this->BottleNumberFor( $number );
        $bottleNumberNext = $this->BottleNumberFor( $bottleNumber->next() );

        return
            ucfirst( "{$bottleNumber} of beer on the wall, ") .
            "{$bottleNumber} of beer.\n" .
            "{$bottleNumber->action()}, " .
            "{$bottleNumberNext} of beer on the wall.\n";
    }
}


class BottleNumber
{
    protected $number;

    public function __construct( int $number ) {
        $this->number = $number;
    }

    public function __toString() : string {
        return $this->quantity() . " " . $this->container();
    }

    public function quantity() : string {
        return (string) $this->number;
    }

    public function container() : string {
        return $this->number == 1 ? "bottle" : "bottles";
    }

    public function pronoun() : string {
        return $this->number == 1 ? "it" : "one";
    }

    public function action() : string {
        return $this->number == 0 ? "Go to the store and buy some more" : "Take ". $this->pronoun() ." down and pass it around";
    }

    public function next() : int {
        return $this->number == 0 ? 99 : $this->number - 1;
    }
}


class BottleNumber0 extends BottleNumber
{
    public function quantity() : string {
        return "no more";
    }
}