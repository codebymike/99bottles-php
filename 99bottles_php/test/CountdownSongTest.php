<?php

require __DIR__ . "/../lib/CountdownSong.php";


class VerseFake implements CountdownSongVerse {
  public static function lyrics(int $number): string {
    return "This is verse {$number}.\n";
  }
}


class CountdownSongTest extends \PHPUnit\Framework\TestCase {

  public function test_verse() {
    $expected = "This is verse 500.\n";
    $this->assertEquals($expected, (new CountdownSong(VerseFake::class))->verse(500));
  }


  public function test_verses() {
    $expected =
      "This is verse 99.\n" .
      "\n" .
      "This is verse 98.\n" .
      "\n" .
      "This is verse 97.\n";

    $this->assertEquals($expected, (new CountdownSong( VerseFake::class ))->verses(99, 97));
  }


  public function test_the_whole_song() {
    // generate expected
    $start = 99;
    $finish = 0;
    $expected = "";
    for ($i = $start; $i >= $finish; $i--) {
      $expected .= "This is verse {$i}.\n";
      if ($i > $finish) {
        $expected .= "\n";
      }
    }

    $this->assertEquals($expected, (new CountdownSong( VerseFake::class ))->song());
  }
}
