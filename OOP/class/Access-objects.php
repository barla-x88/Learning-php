<?php

// Access object like an array

class Person implements ArrayAccess
{

    private array $items = [];

    //checks if key exist in $items
    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    } 

    //gets the value for key in $items
    public function offsetGet($offset)
    {
        return $this->items[$offset] ?? null;
    } 

    //set a key value in $items
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    //unsets a key value in $items
    public function offsetUnset($offset): void
    {
        unset($this->items[$offset]);
    }
}

$john = new Person();

// Accessing object as if it were an array
$john['name'] = 'John Smith';
$john['age'] = 29;

$value = $john['name'];
var_dump($value);
