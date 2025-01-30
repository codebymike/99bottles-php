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
        return (new BottleNumber( $number ))->quantity();
    }

    public function container( int $number ) : string {
        return (new BottleNumber( $number ))->container();
    }

    public function pronoun( int $number ) : string {
        return (new BottleNumber( $number ))->pronoun();
    }

    public function action( int $number ) : string {
        return (new BottleNumber( $number ))->action();
    }

    public function next( int $number ) : int {
        return (new BottleNumber( $number ))->next();
    }

    public function verse( int $number ): string {

        $bottleNumber = new BottleNumber( $number );

        return
            ucfirst( $bottleNumber->quantity() ) ." ". $bottleNumber->container() ." of beer on the wall, " .
            $bottleNumber->quantity() . " " . $bottleNumber->container() . " of beer.\n" .
            $bottleNumber->action() . ", " .
            $bottleNumber->next()->quantity() ." ". $bottleNumber->next()->container() ." of beer on the wall.\n";
    }
}

class BottleNumber
{
    protected $number;

    public function __construct( int $number ) {
        $this->number = $number;
    }

    public function quantity() : string {
        return $this->number == 0 ? "no more" : (string) $this->number;
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

    public function next() : BottleNumber {
        return $this->number == 0 ? new BottleNumber(99) : new BottleNumber($this->number - 1);
    }
}
