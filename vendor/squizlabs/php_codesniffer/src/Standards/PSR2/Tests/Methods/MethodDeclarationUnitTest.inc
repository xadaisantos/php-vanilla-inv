<?php

class MyClass
{
    function _myfunction () {}
    private function myfunction () {}
    function __myfunction () {}
    public static function myfunction () {}
    static public /*comment*/ function myfunction () {}
    final public function myfunction () {}
    public /*comment*/ final function myfunction () {}
    abstract private function myfunction ();
    private /*comment*/ abstract function myfunction ();
    final public /*comment*/ static function myfunction () {}
    static protected final abstract function myfunction ();
    public function _() {}
}

interface MyInterface
{
    function _myfunction ();
    function __myfunction ();
    public static function myfunction ();
    static public function myfunction ();
    public function _();
}

trait MyTrait
{
    function _myfunction () {}
    private function myfunction () {}
    function __myfunction () {}
    public static function myfunction () {}
    static public function myfunction () {}
    final /*comment*/ public function myfunction () {}
    public final function myfunction () {}
    abstract private function myfunction ();
    private abstract function myfunction ();
    final public static function myfunction () {}
    static /*comment*/ protected final abstract function myfunction ();
    public function _() {}
}

$a = new class()
{
    function _myfunction () {}
    private function myfunction () {}
    function __myfunction () {}
    public static function myfunction () {}
    static public function myfunction () {}
    final public function myfunction () {}
    public final function myfunction () {}
    abstract private function myfunction ();
    private abstract function myfunction ();
    final public static function myfunction () {}
    static protected final abstract function myfunction ();
    public function _() {}
}

class Nested_Function {
    public function getAnonymousClass() {
        return new class() {
			static private final function _nested_function () {}
        };
    }
}

enum MyEnum
{
    function _myfunction () {}
    function __myfunction () {}
    public static function myfunction () {}
    static public function myfunction () {}
    public function _() {}
}
