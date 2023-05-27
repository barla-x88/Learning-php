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
