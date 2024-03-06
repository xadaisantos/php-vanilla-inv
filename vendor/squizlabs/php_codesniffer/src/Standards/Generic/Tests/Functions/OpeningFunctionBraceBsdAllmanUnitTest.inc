<?php

// Brace should be on new line.
function myfunction () {
}

// Good.
function myfunction ()
{
}

// Too many spaces.
function myfunction ()   {
}

// Too many newlines.
function myfunction ()

{
}

// Space before brace.
function myfunction ()
 {
}

class myClass
{
    // Brace should be on new line.
    function myfunction () {
    }
    
    // Good.
    function myfunction ()
    {
    }

    // No aligned correctly.
    function myfunction ()
{
}
    
    // Too many spaces.
    function myfunction ()   {
    }
    
    // Too many newlines.
    function myfunction ()

    {
    }
    
    // Space before brace.
    function myfunction ()
     {
    }
}



/* Multi-line declarations */



// Brace should be on new line.
function myfunction ($variable1, $variable2,
    $variable3, $variable4) {
}

// Good.
function myfunction ($variable1, $variable2,
    $variable3, $variable4)
{
}

// Too many spaces.
function myfunction ($variable1, $variable2,
    $variable3, $variable4)   {
}

// Too many newlines.
function myfunction ($variable1, $variable2,
    $variable3, $variable4)

{
}

// Space before brace.
function myfunction ($variable1, $variable2,
    $variable3, $variable4)
 {
}

class myClass
{
    // Brace should be on new line.
    function myfunction ($variable1, $variable2,
    $variable3, $variable4) {
    }
    
    // Good.
    function myfunction ($variable1, $variable2,
    $variable3, $variable4)
    {
    }

    // No aligned correctly.
    function myfunction ($variable1, $variable2,
    $variable3, $variable4)
{
}
    
    // Too many spaces.
    function myfunction ($variable1, $variable2,
    $variable3, $variable4)   {
    }
    
    // Too many newlines.
    function myfunction ($variable1, $variable2,
    $variable3, $variable4)

    {
    }
    
    // Space before brace.
    function myfunction ($variable1, $variable2,
    $variable3, $variable4)
     {
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

// phpcs:set Generic.Functions.OpeningFunctionBraceBsdAllman checkClosures 1

$closureWithArgs = function ($arg1, $arg2) {
    // body
};

$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // body
};

$test = function ($param) use ($result) {
    return null;
};

$test = function ($param) use ($result) : Something {
    return null;
};

// phpcs:set Generic.Functions.OpeningFunctionBraceBsdAllman checkClosures 0

$closureWithArgs = function ($arg1, $arg2) {
    // body
};

class Foo
{
//Comments should not affect code
    public function bar()
    {

    }
//Comments should not affect code
}

function myfunction () : Something {
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array {
    return null;
}

function myfunction ($a, $lot, $of, $params) { // comment
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array { // comment
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array { // phpcs:ignore Standard.Category.Sniff -- for reasons.
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array {// phpcs:ignore Standard.Category.Sniff -- for reasons.
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array
{ // phpcs:ignore Standard.Category.Sniff -- for reasons.
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array /* phpcs:ignore Standard.Category.Sniff -- for reasons */ {
    return null;
}

function myfunction ($a, $lot, $of, $params)
    : array /* comment */ {
    return null;
}

class Issue3357
{
    public function extraLine(string: $a) : void

    {
        // code here.
    }
}

function issue3357WithoutIndent(string: $a) : void


{
    // code here.
}

class Issue3357WithComment
{
    public function extraLine(string: $a) : void
    // Comment.
    {
        // code here.
    }
}

    function myfunction ()
    {}
    function myfunction ()
          {} // Too many spaces indent with an empty function.
    function myfunction ()
{} // Too little spaces indent with an empty function.
