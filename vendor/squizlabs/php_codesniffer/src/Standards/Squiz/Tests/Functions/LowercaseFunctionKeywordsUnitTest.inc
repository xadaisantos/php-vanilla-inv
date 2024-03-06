<?php
// Correct.
function Foo() {}
$a = function () {};

abstract class Foo {
	public function Publicfunction () {}
	private function Privatefunction () {}
	protected function Protectedfunction () {}
	static function Staticfunction () {}
	abstract protected function AbstractProtectedfunction ();
	final static public function FinalStaticPublicfunction () {}
}

// Incorrect.
Function Bar() {}
$a = function () {};

abstract class Bar {
	Public function Publicfunction () {}
	Private function Privatefunction () {}
	Protected function Protectedfunction () {}
	Static function Staticfunction () {}
	ABSTRACT proTECted FUNCTION AbstractProtectedfunction ();
	Final STATIC PUBLIC Function FinalStaticPublicfunction () {}
}

$a = FN($x) => $x;
