<?php

function __construct()
{
}//end __construct()

function myfunction ()
{
}//end myfunction ()

function ourfunction ()
{
}//end ourFunction

function yourfunction ()
{
}//end myfunction ()

class TestClass
{
    function __construct()
    {
    }//end __construct()

    function myfunction ()
    {
    }//end myfunction ()

    function yourfunction ()
    {
    }//end myfunction ()

}//end class

abstract class TestClass
{
    abstract function myfunction ();

    function ourfunction ()
    {
    }//end myfunction ()

    function yourfunction ()
    {
    }//end yourfunction ()

}//end class

interface TestClass
{
    function myfunction ();
    function ourfunction ();
    function yourfunction ();

}//end interface

class TestClass
{
}

abstract class TestClass
{
}

interface TestClass
{
}

class MyClass
{
    public function myfunction ();
}//end class

// Closures don't need end comments.
echo preg_replace_callback('~-([a-z])~', function ($match) { return strtoupper($match[1]); }, 'hello-world');

class TestClass
{
}
//end class

enum MissingClosingComment {
}

enum HasClosingComment {
}//end enum
