# Learning-php

Contains notes and sample code for learning PHP

## PHP Basics

### Embedding PHP Code in HTML files

Using normal php tag

```PHP
<p>
 <?php
  echo "hello world!";
 ?>
</p>
```

Using shortTag

```PHP
<p>
 <?
  echo "Using shortTag";

  //sigle quotes allow you to print sting literally
  echo 'hello \n world';
 ?>
</p>
```

Quickly escape to and from PHP to output a bit of dynamic text.

```PHP
<p>
 <?= "shortcircuit syntax";?>
</p>
```

Multiple php code blocks can be used within a single page. Variables declared in prior code blocks are remembered for later block.

**Recognised Escape Sequences**
| Sequence | Description |
| -------- | ----------------- |
| \n | Newline character |
| \r | Carriage returns |
| \t | Horizontal tab |
| \\\ | backslash |
| \\$ | Dollar sign |
| \\" | Double Quote |

### Commenting code

```PHP
// single line comment
# single line comment

/*
*
* multi line comment
*
*/

```

### Outputing data

Using echo

```PHP
$text = "HELLO";
$text2 = "WORLD";

echo $text, $text2;

//embed variables directly in double quoted strings
echo "{$text} WORLD";


//Parsing variables representing complex data types such as arrays or objects.
echo "The capital of Ohio is {$capitals['ohio']}.";

```

Complex output (a blend of static text and dynamic information) Using the printf() [Documentation](https://www.tutorialrepublic.com/php-reference/php-printf-function.php)

```PHP
printf("Bar inventory: %d bottles of tonic water.", 100);

```

`%d` is type specifier. [List of type specifiers](https://www.php.net/manual/en/function.printf.php)

### Data Types

1. Scalar data types - Boolean, integer, float and string
2. Compound data types - Array and object

Falsy values - 0, '0', false and null

### Variable Declaration

A variable always begins with a dollar sign, $, which is then followed by the variable name. Variable names can begin with either a letter or an underscore and can consist of letters, underscores, numbers, or other ASCII characters ranging from 127 through 255.

```PHP
$price = 7.42;

//defining constants
// it is common practice to define constant names as all uppercase letetrs
define("PI", 3.141592);
// Or by using the const keyword:
Const PI = 3.141592;

echo PI;
//use the constant() function to read a constant's value
//if the constant's name is obtained dynamically.

```

Two methodologies are available for variable assignment: by value and by reference.

```PHP
//by value
$value1 = "Hello";

//by reference
$value2 =& $value1;    // $value1 and $value2 both equal "Hello"
$value2 = &$value1;    // Alternative syntax

```

### Type casting

| Cast operator                 | conversion |
| ----------------------------- | ---------- |
| (array)                       | Array      |
| (bool) or (boolean)           | Boolean    |
| (int) or (integer)            | Integer    |
| (object)                      | Object     |
| (real) or (double) or (float) | float      |
| (string)                      | string     |

any data type can be cast as an object. The result is that the variable becomes an attribute of the object, the attribute having the name `scalar`:

```PHP
$model = "Toyota";
$obj = (object) $model;
// The value can then be referenced as follows:
print $obj->scalar; // returns "Toyota"
```

### PHP's Superglobal Variables

`$_SERVER` - An associative array that contains information created by the web server, such as details regarding the server and client configuration and the current request environment.

`$_GET` - Contains parameters passed using GET METHOD.

`$_POST` - Contains parameters passed using POST METHOD.

`$_ENV` - Offers information regarding the PHP parser’s underlying server environment like hostname.

[Documentation](https://www.php.net/manual/en/language.variables.superglobals.php)

### Control structures

#### Conditional statements

if statement

```PHP
if (expression) {
    statement;
}
```

else statment

```PHP
if (expression) {
	statement;
} else {
	statement;
}
```

elseif statement

```PHP
if (expression) {
	statement;
} elseif {
	statement;
} else {
	statement;
}
```

switch statement

```PHP
switch($variable) {
    case 1:
        echo "Hello";
        break;
    case 2:
        echo "world";
        break;
    default:
        echo "Hi there!";
}
```

#### Looping statements

The **while statement** specifies a condition that must be met before execution of its embedded code is terminated.

```PHP
while (expression) {
	statements
}
```

The **do...while** looping statement is a variant of while, but it verifies the loop conditional at the conclusion of the block rather than at the beginning.

```PHP
do {
	statements
} while (expression);
```

**for statement**

`expression1` is evaluated by default at the first iteration of the loop. `expression2` is evaluated at the beginning of each iteration. This expression determines whether looping will continue. `expression3` is evaluated at the conclusion of each loop.

Any of the expressions can be empty, their purpose substituted by logic embedded within the for block.

```PHP
for (expression1; expression2; expression3) {
	statements
}
```

Using **foreach statement** to loop through arrays

```PHP
foreach ($array_expr as $value) {
statement;
}

//loop through associative array
foreach (array_expr as $key => $value) {
statement;
}
```

**The break & Continue Statements**

Encountering a `break` statement will immediately end execution of a do...while, for, foreach, switch, or while block.
The `continue` statement causes execution of the current loop iteration to end and commence at the beginning of the next iteration.

### File Inclusion statements

Including a file produces the same result as copying the code from the file specified into the location in which the statement appears.

```PHP
// Issues the warning if file is not found and execution continues.
include "/path/to/filname";

//make sure the file is included only once
include_once "/path/to/filname";



// if file is not found issue a compiler warning and halt execution
require "/path/to/filname";

//make sure file is required only once
require_once "/path/to/filname";

```

## Functions

### Function definition

A function definition looks like this -

```PHP
function calculateSalesTax($price, $tax)
{
return $price + ($price * $tax);
}

//Function definition with default argument values
function calculateSalesTax($price, $tax = 0.0675)
{
    $total = $price + ($price * $tax);
    echo "Total cost: $total";
}

//Mark parameters optional by assigning them a default value of nothing
function calculateSalesTax($price, $tax = 0)
{
// Function body
}
```

Default argument values must appear at the end of the parameter list and must be constant expressions; you cannot assign nonconstant values such as function calls or variables.

### Anonymous Functions

These are used for callback functions where a specific function is called as a result of calling another function. These functions are called **anonymous functions or closures**. They do not have a function name.

```PHP
//Closures can be defined as content of a variable:
$example = function() {
echo "Closure";
};


$example();
```

### Passing arguments

**Passing arguments by value**

```PHP
$pricetag = 15.00;
$salestax = .0675;
$total = calculateSalesTax($pricetag, $salestax);

//or
calculateSalesTax(15.00, .0675);
```

When arguments are passed in this manner Any changes made to those values within the scope of the function are ignored outside of the function. In essence the interpreter creates a copy of each variable.

**Passing arguments by reference**

```PHP
$a = 15;
$example = function() use (&$a) {
$a += 100;
echo $a . "\n";
};
```

The global variable $a is made available by reference. This causes the global value to change when the closure is executed. The [`use` keyword](https://blog.devgenius.io/php-7-x-p40-use-keyword-37d8e7df9138) allows us to access global variable.

## Arrays

In PHP, arrays can have elements of different data types. Array Keys can be
numerical or associative.

```PHP
//creating an array
$carBrands = ["Cheverolet", "Chrysler""Ford", "Honda", "Toyota"];

//accessing array values
echo $carBrands[0]; // Prints Cheverolet

//adding item to an array
//puts item as the last element of array
$state[] = "Pennsylvania";


//associative array
$states = ["OH" => "Ohio", "PA" => "Pennsylvania", "NY" => "New York"];

//accessing values;
echo $states["OH"]; //prints Ohio


```

### Useful functions for working with arrays

**list()** - The list() function is used to extract elements from an array and assign them to individual variables. It allows you to quickly and conveniently assign values from an array to multiple variables in one line of code. This function is particularly useful when dealing with associative arrays. You can access the array elements using numerical indices or associative keys. Documentation: [list()](https://www.php.net/manual/en/function.list.php)

**range()** - The range() function generates an array of elements based on a specified range of numbers. It allows you to create an array containing a sequence of numbers, either incrementing or decrementing, with a defined start, end, and optional step value. This function is commonly used when you need to iterate over a specific range of values or create a numeric array of consecutive numbers. Documentation: [range()](https://www.php.net/manual/en/function.range.php)

**is_array()** - The is_array() function is used to determine whether a variable is an array or not. It checks if a given variable is an array data type and returns true if it is, or false if it is not. This function is helpful when you need to validate whether a variable holds an array before performing array-related operations on it. Documentation: [is_array()](https://www.php.net/manual/en/function.is-array.php)

**print_r()** - The print_r() function is used to display structured information about a variable in a human-readable format. It is primarily used for debugging purposes to inspect the contents of an array, object, or other complex data structures. It outputs the elements of the variable, including their values and data types, making it easier to understand the structure and content of the variable. Documentation: [print_r()](https://www.php.net/manual/en/function.print-r.php)

**vprintf()** - The vprintf() function is used to output a formatted string using a variable number of arguments. It allows you to specify a format string and pass an array of values that will be inserted into the format string based on placeholders. This function is similar to printf(), but it accepts an array of arguments instead of individual arguments. It is useful when you have a dynamic number of values to be formatted and printed. Documentation: [vprintf()](https://www.php.net/manual/en/function.vprintf.php)

**var_dump()** - The var_dump() function displays structured information about one or more variables. It provides detailed information about the variable's type, value, and structure. In addition to the variable's value, var_dump() also shows the data type, string length, array length, and other details. It is commonly used for debugging and analyzing variable contents when you need to examine the internal structure and values of variables. Documentation: [var_dump()](https://www.php.net/manual/en/function.var-dump.php)

### Array methods

**array_unshift()** - Adds one or more elements to the beginning of an array. [array_unshift()](https://www.php.net/manual/en/function.array-unshift.php)

**array_push()** - Adds one or more elements to the end of an array. [array_push()](https://www.php.net/manual/en/function.array-push.php)

**array_shift()** - Removes and returns the first element from an array. [array_shift()](https://www.php.net/manual/en/function.array-shift.php)

**array_pop()** - Removes and returns the last element from an array. [array_pop()](https://www.php.net/manual/en/function.array-pop.php)

**in_array()** - Checks if a value exists in an array. [in_array()](https://www.php.net/manual/en/function.in-array.php)

**array_key_exists()** - Checks if a specified key exists in an array. [array_key_exists()](https://www.php.net/manual/en/function.array-key-exists.php)

**array_search()** - Searches for a value in an array and returns its corresponding key. [array_search()](https://www.php.net/manual/en/function.array-search.php)

**array_keys()** - Returns all the keys from an array. [array_keys()](https://www.php.net/manual/en/function.array-keys.php)

**array_values()** - Returns all the values from an array. [array_values()](https://www.php.net/manual/en/function.array-values.php)

**array_column()** - Returns the values from a single column in a multi-dimensional array. Useful for working with data coming from database [array_column()](https://www.php.net/manual/en/function.array-column.php)

### Traversing Arrays

array pointers are internal indicators that keep track of the current position within an array. They allow you to traverse and manipulate arrays in a sequential manner. The concept of array pointers is particularly relevant when working with functions that modify the array's internal pointer, such as array_shift(), array_pop() etc.

**key()** - Retrieves the key of the current element in an array. [key()](https://www.php.net/manual/en/function.key.php)

**current()** - Retrieves the value of the current element in an array. [current()](https://www.php.net/manual/en/function.current.php)

**next()** - Advances the array pointer to the next element and returns its value. [next()](https://www.php.net/manual/en/function.next.php)

**prev()** - Moves the array pointer to the previous element and returns its value. [prev()](https://www.php.net/manual/en/function.prev.php)

**reset()** - Resets the array pointer to the first element and returns its value. [reset()](https://www.php.net/manual/en/function.reset.php)

**end()** - Sets the array pointer to the last element and returns its value. [end()](https://www.php.net/manual/en/function.end.php)

**Passing Array Values to a Function**

**array_walk()** - The array_walk() function applies a user-defined callback function to each element of an array. It iterates over each element and allows you to modify the values directly within the array. The callback function receives the value of the current element as a parameter and can modify it as needed.

```PHP
array_walk(array &$array, callable $callback, mixed $userdata = null): bool

```

**array_walk_recursive()** - The array_walk_recursive() function is similar to array_walk(), but it recursively applies a user-defined callback function to each element of a multi-dimensional array. It traverses through all nested arrays and applies the callback function to each individual element.

```PHP
array_walk_recursive(array &$array, callable $callback, mixed $userdata = null): bool
```

**array_map()** - The array_map() function applies a user-defined callback function to each element of one or more arrays and returns a new array with the modified values.

```PHP
array_map(callable $callback, array $array1, array ...$arrays): array
```

### Counting array values and sorting arrays

**count()** - The count() function is used to count the number of elements in an array or the number of properties in an object. It returns the count as an integer. Documentation: [count()](https://www.php.net/manual/en/function.count.php)

**sizeof()** - The sizeof() function is an alias of count(). It is used to count the number of elements in an array or the number of properties in an object and returns the count as an integer. Documentation: [sizeof()](https://www.php.net/manual/en/function.sizeof.php)

**array_count_values()** - The array_count_values() function counts the occurrences of each unique value in an array and returns an associative array with the values as keys and their respective counts as values. Documentation: [array_count_values()](https://www.php.net/manual/en/function.array-count-values.php)

**array_unique()** - The array_unique() function removes duplicate values from an array and returns a new array with the unique values. It preserves the original order of the elements. Documentation: [array_unique()](https://www.php.net/manual/en/function.array-unique.php)

**array_reverse()** - The array_reverse() function reverses the order of elements in an array and returns a new array with the reversed order. Documentation: [array_reverse()](https://www.php.net/manual/en/function.array-reverse.php)

**array_flip()** - The array_flip() function exchanges the keys with their associated values in an array. It returns a new array with the keys and values swapped. Documentation: [array_flip()](https://www.php.net/manual/en/function.array-flip.php)

**sort()** - The sort() function sorts the elements of an array in ascending order. It modifies the original array. Documentation: [sort()](https://www.php.net/manual/en/function.sort.php)

**asort()** - The asort() function sorts an associative array by its values in ascending order, preserving the key-value associations. It modifies the original array. Documentation: [asort()](https://www.php.net/manual/en/function.asort.php)

**rsort()** - The rsort() function sorts the elements of an array in descending order. It modifies the original array. Documentation: [rsort()](https://www.php.net/manual/en/function.rsort.php)

**arsort()** - The arsort() function sorts an associative array by its values in descending order, preserving the key-value associations. It modifies the original array. Documentation: [arsort()](https://www.php.net/manual/en/function.arsort.php)

**natsort()** - The natsort() function sorts an array using a "natural order" algorithm, which is suitable for sorting strings that contain numbers. It modifies the original array. Documentation: [natsort()](https://www.php.net/manual/en/function.natsort.php)

**ksort()** - The ksort() function sorts an associative array by its keys in ascending order, preserving the key-value associations. It modifies the original array. Documentation: [ksort()](https://www.php.net/manual/en/function.ksort.php)

**usort()** - The usort() function sorts an array using a user-defined comparison function. It modifies the original array. Documentation: [usort()](https://www.php.net/manual/en/function.usort.php)

### Merging, Slicing, Splicing, and Dissecting Arrays

**array_merge()** - The array_merge() function merges two or more arrays into a single array. It creates a new array containing the values of all the input arrays. If the input arrays have string keys, the values with duplicate keys will overwrite each other. The return value is a new array with the merged values. Documentation: [array_merge()](https://www.php.net/manual/en/function.array-merge.php)

**array_merge_recursive()** - The array_merge_recursive() function merges two or more arrays recursively. It behaves similarly to array_merge(), but when it encounters arrays with the same string keys, it merges them recursively rather than overwriting the values. This is useful when dealing with multi-dimensional arrays. The return value is a new array with the recursively merged values. Documentation: [array_merge_recursive()](https://www.php.net/manual/en/function.array-merge-recursive.php)

**array_combine()** - The array_combine() function creates a new array using one array for keys and another array for values. It takes two arrays of equal length as input, with one serving as the keys and the other as the values. The return value is a new array with the keys and values combined. Documentation: [array_combine()](https://www.php.net/manual/en/function.array-combine.php)

**array_slice()** - The array_slice() function extracts a portion of an array and returns it as a new array. It allows you to specify the starting index and optionally the length of the slice. This function is useful when you need to extract a subset of elements from an array. The return value is a new array containing the extracted elements. Documentation: [array_slice()](https://www.php.net/manual/en/function.array-slice.php)

**array_splice()** - The array_splice() function removes a portion of an array and replaces it with new elements. It modifies the original array and can also insert new elements at the same time. This function is useful for adding, removing, or replacing elements in an array. The return value is an array containing the removed elements. Documentation: [array_splice()](https://www.php.net/manual/en/function.array-splice.php)

**array_intersect()** - The array_intersect() function returns an array containing the values that are present in all the input arrays. It compares the values of the arrays and returns the values that exist in all arrays. The return value is a new array with the intersecting values. Documentation: [array_intersect()](https://www.php.net/manual/en/function.array-intersect.php)

**array_intersect_key()** - The array_intersect_key() function returns an array containing the values from the first array whose keys exist in all the input arrays. It compares the keys of the arrays and returns the values associated with the intersecting keys. The return value is a new array with the intersecting values. Documentation: [array_intersect_key()](https://www.php.net/manual/en/function.array-intersect-key.php)

**array_intersect_ukey()** - The array_intersect_ukey() function returns an array containing the values from the first array whose keys exist in all the input arrays. It compares the keys of the arrays using a user-defined callback function and returns the values associated with the intersecting keys. The return value is a new array with the intersecting values. Documentation: [array_intersect_ukey()](https://www.php.net/manual/en/function.array-intersect-ukey.php)

**array_diff()** - The array_diff() function compares the values of one array against one or more other arrays and returns the values that are present in the first array but not in the other arrays. It compares the values and ignores the keys. The return value is a new array with the differing values. Documentation: [array_diff()](https://www.php.net/manual/en/function.array-diff.php)

**array_udiff()** - The array_udiff() function compares the values of one array against one or more other arrays using a user-defined comparison function. It returns the values that are present in the first array but not in the other arrays. The comparison is done using the user-defined callback function. The return value is a new array with the differing values. Documentation: [array_udiff()](https://www.php.net/manual/en/function.array-udiff.php)

**array_diff_key()** - The array_diff_key() function compares the keys of one array against one or more other arrays and returns the keys that are present in the first array but not in the other arrays. It compares the keys and ignores the values. The return value is a new array with the differing keys. Documentation: [array_diff_key()](https://www.php.net/manual/en/function.array-diff-key.php)

**array_diff_ukey()** - The array_diff_ukey() function compares the keys of one array against one or more other arrays using a user-defined comparison function. It returns the keys that are present in the first array but not in the other arrays. The comparison is done using the user-defined callback function. The return value is a new array with the differing keys. Documentation: [array_diff_ukey()](https://www.php.net/manual/en/function.array-diff-ukey.php)

**array_diff_assoc()** - The array_diff_assoc() function compares the keys and values of one array against one or more other arrays and returns the values that are present in the first array but not in the other arrays. It compares both the keys and values. The return value is a new array with the differing values. Documentation: [array_diff_assoc()](https://www.php.net/manual/en/function.array-diff-assoc.php)

**array_udiff_assoc()** - The array_udiff_assoc() function compares the keys and values of one array against one or more other arrays using a user-defined comparison function. Iyt compares both keys and values using a user-defined callback function for comparison.Documentation: [array_udiff_assoc()](https://www.php.net/manual/en/function.array-udiff-assoc.php)

**array_udiff_uassoc()** - The array_udiff_uassoc() function compares the keys and values of one array against one or more other arrays using separate user-defined comparison functions for keys and values. Documentation: [array_udiff_uassoc()](https://www.php.net/manual/en/function.array-udiff-uassoc.php)

**array_diff_uassoc()** - The array_diff_uassoc() function compares the keys and values of one array against one or more other arrays using a user-defined comparison function for values and the internal function for key comparison. Documentation: [array_diff_uassoc()](https://www.php.net/manual/en/function.array-diff-uassoc.php)

**array_rand()** - Returns a random key(s) from an array. [array_rand()](https://www.php.net/manual/en/function.array-rand.php)

**shuffle() **- Randomly shuffles the elements of an array. [shuffle()](https://www.php.net/manual/en/function.shuffle.php)

**array_sum()** - Calculates and returns the sum of values in an array. [array_sum()](https://www.php.net/manual/en/function.array-sum.php)

**array_chunk()** - Splits an array into chunks of a specified size. Returns a multidimensional array of chunks. [array_chunk()](https://www.php.net/manual/en/function.array-chunk.php)
