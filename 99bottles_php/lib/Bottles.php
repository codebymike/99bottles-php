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

    public function verse( int $number ): string {

        return (new BottleVerse($number))->lyrics();

        $bottleNumber = BottleNumber::for( $number );

        return
            ucfirst( "{$bottleNumber} of beer on the wall, ") .
            "{$bottleNumber} of beer.\n" .
            "{$bottleNumber->action()}, " .
            "{$bottleNumber->next()} of beer on the wall.\n";
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

    public static function for( int $number ) : BottleNumber {
        if( $number == 0 ) {
            $className = BottleNumber0::class;
        } else if( $number == 1 ) {
            $className = BottleNumber1::class;
        } else if( $number == 6 ) {
            $className = BottleNumber6::class;
        } else {
            $className = BottleNumber::class;
        }
        return new $className($number);
    }

    public function quantity() : string {
        return (string) $this->number;
    }

    public function container() : string {
        return "bottles";
    }

    public function pronoun() : string {
        return "one";
    }

    public function action() : string {
        return "Take ". $this->pronoun() ." down and pass it around";
    }

    public function next() : object {
        return BottleNumber::for( $this->number - 1 );
    }
}


class BottleNumber0 extends BottleNumber
{
    public function quantity() : string {
        return "no more";
    }

    public function action() : string {
        return "Go to the store and buy some more";
    }

    public function next() : object {
        return BottleNumber::for( 99 );
    }
}

class BottleNumber1 extends BottleNumber
{
    public function container() : string {
        return "bottle";
    }

    public function pronoun() : string {
        return "it";
    }
}

class BottleNumber6 extends BottleNumber
{
    public function quantity() : string {
        return '1';
    }

    public function container() : string {
        return "six-pack";
    }
}