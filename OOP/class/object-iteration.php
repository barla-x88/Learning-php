<?php

// class ExampleObject
// {
//     public string $prop1 = 'text1';
//     public string $prop2 = 'text2';
//     public string $prop3 = 'text3';

//     private string $prop4 = 'text4';
//     private string $prop5 = 'text5';

// }

// $object = new ExampleObject();

// foreach ($object as $item => $value) {
//     echo "$item : $value \n";
// }

// use Symfony\Component\VarDumper\VarDumper;

// require_once "../../vendor/autoload.php";

// class TraversableDemoClass implements Iterator
// {
//     private array $stocks = ['AMZN', 'MSFT', 'BABA', 'NFLX'];

//     //represents index of the array
//     private int $index = 0;

//     //return current element in an array
//     public function current()
//     {
//         return $this->stocks[$this->index];
//     }

//     public function next(): void
//     {
//         $this->index++;
//     }

//     public function key() {
//         return $this->index;
//     }use Symfony\Component\VarDumper\VarDumper;

// require_once "../../vendor/autoload.php"; there are any more rows which can be iterated over
//     //we do that by checking if '$this->index' is set
//     //i.e there is some item at $this->index position
//     public function valid(): bool 
//     {
//         return isset($this->stocks[$this->index]);
//     }

//     public function rewind(): void
//     {
//         $this->index = 0;
//     }
// }

// $travDemo = new TraversableDemoClass();

// VarDumper::dump(is_iterable($travDemo)); // returns 'true'

// function iterate_things(iterable $iterable)
// {
//     foreach ($iterable as $item => $value) {
//         print "$item: $value" . PHP_EOL;
//     }
// }

// iterate_things($travDemo);

class MappedIteratorDemo implements Iterator, Countable
{
    public function __construct(private array $items = []) {}

    //return current element in an array
    public function current()
    {
        return current($this->items);
    }

    public function next(): void
    {
        next($this->items);
    }

    public function key() {
        return key($this->items);
    }

    public function valid(): bool 
    {
        return key($this->items) !== null;
    }

    public function rewind(): void
    {
        reset($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}

//Sometimes you refer to arrays as mapped arrays if you use strings as keys.
$mappedArray = [
    'name' => 'Gary',
    'location' => 'Manchester, UK',
    'role' => 'Software Developer'
];

$mappedIteratorObject = new MappedIteratorDemo($mappedArray);

function iterate_things(iterable $iterable)
{
    foreach ($iterable as $item => $value) {
        print "$item: $value" . PHP_EOL;
    }
}

iterate_things($mappedIteratorObject);

print count($mappedIteratorObject) . PHP_EOL;