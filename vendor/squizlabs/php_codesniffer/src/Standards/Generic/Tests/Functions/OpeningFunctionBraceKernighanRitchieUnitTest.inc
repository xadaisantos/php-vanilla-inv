<?php

// Good.
function myfunction () {
}

// Brace should be on same line.
function myfunction ()
{
}

// Too many spaces.
function myfunction ()   {
}

// Uses tab.
function myfunction ()	{
}


class myClass
{
    // Good.
    function myfunction () {
    }
    
    // Brace should be on same line.
    function myfunction ()
    {
    }
    
    // Too many spaces.
    function myfunction ()   {
    }
    
    // Uses tab.
    function myfunction ()	{
    }
}



/* Multi-line declarations */

// Good.
function myfunction ($variable1, $variable2,
    $variable3, $variable4) {
}

// Brace should be on same line.
function myfunction ($variable1, $variable2,
    $variable3, $variable4)
{
}

// Too many spaces.
function myfunction ($variable1, $variable2,
    $variable3, $variable4)   {
}

// Uses tab.
function myfunction ($variable1, $variable2,
    $variable3, $variable4)	{
}


class myClass
{
    // Good.
    function myfunction ($variable1, $variable2,
        $variable3, $variable4) {
    }
    
    // Brace should be on same line.
    function myfunction ($variable1, $variable2,
        $variable3, $variable4)
    {
    }
    
    // Too many spaces.
    function myfunction ($variable1, $variable2,
        $variable3, $variable4)   {
    }
    
    // Uses tab.
    function myfunction ($variable1, $variable2,
        $variable3, $variable4)	{
    }
}

interface MyInterface
{
    function myfunction ();
}

function myfunction (
                    $arg1,
                    $arg2,
                    $arg3,
                    $arg4,
                    $arg5,
                    $arg6
                    )
{
}

function myfunction (
                    $arg1,
                    $arg2,
                    $arg3,
                    $arg4,
                    $arg5,
                    $arg6
                    ) {
}

function myfunction () {}
function myfunction ()
{}

// phpcs:set Generic.Functions.OpeningFunctionBraceKernighanRitchie checkClosures 1

$closureWithArgs = function ($arg1, $arg2) {
    // body
};

$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // body
};

$test = function ($param) use ($result)
{
    return null;
};

$test = function ($param) use ($result) : Something
{
    return null;
};

$test = function ($param) use ($result) : Something
{
    return null;
};

foo(function ($bar) { ?>
    <div><?php echo $bar; ?></div>
<?php });

// phpcs:set Generic.Functions.OpeningFunctionBraceKernighanRitchie checkClosures 0

$closureWithArgs = function ($arg1, $arg2) {
    // body
};

function myfunction () : Something
{
    return null;
}

function myfunction () : Something // Break me
{
    return null;
}

function myfunction () : Something {
    return null;
}

function myfunction () : Something
{
    return null;
}

function myfunction ($bar) { ?>
    <div><?php echo $bar; ?></div>
<?php }

function myfunction ($a, $lot, $of, $params)
    : array
{
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array {
    return null;
}

function myfunction ($a, $lot, $of, $params) // comment
{
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array // comment
{
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array // phpcs:ignore Standard.Category.Sniff -- for reasons.
{
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array { // phpcs:ignore Standard.Category.Sniff -- for reasons.
    return null;
}

function myfunction () {}
function myfunction ()      {} // Too many spaces with an empty function.
function myfunction ()	{} // Too many spaces (tab) with an empty function.
