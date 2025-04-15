# '99 Bottles' Song - OO PHP Implementation

Practice using good OO design principles and TDD to implement and then refactor code which generates a (seemingly) simple song.

## Notes

- Good OO is built upon small, interchangeable objects that interact via abstractions
- Every code improvement (DRY, composition, DI) has a complexity cost
- If you are capable of writing a smart, complex solution, it is imcumbent to accept the harder task of writing simpler code
- Seek opportunities to move object creation towards the edges of the application
- As tests get more specific, code should become more generic
- "make the change easy (warning: this may be hard), then make the easy change"

## Run Tests

```
$ ./vendor/bin/phpunit test
```

## Initial 'Shameless Green' implementation for comparison

```
class Bottles {
    public functions song() : string {
        return $this->verses(99, 0);
    }

    public function verses( int $start, int $finish ) : string {
        return implode(
                "\n", array_map(
                    function( $number ) {
                        return $this->verse( $number );
                    },
                    range( $start, $finish )
                )
            );
    }

    public function verse( int $number ) : string {
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
            case 2:
                return
                    "2 bottles of beer on the wall, " .
                    "2 bottles of beer.\n" .
                    "Take one down and pass it around, " .
                    "1 bottle of beer on the wall.\n";
            default:
                return
                    $number . " bottles of beer on the wall, " .
                    $number . " bottles of beer.\n" .
                    "Take one down and pass it around, " .
                    ($number - 1) . " bottles of beer on the wall.\n";
        }
    }
}
```
