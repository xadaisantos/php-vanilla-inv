<?php

/* testBasicFunction */
function myfunction () {}

/* testReturnFunction */
function myfunction (array ...$arrays) : array
{
    /* testNestedClosure */
    return array_map(function (array $array) : int {
        return array_sum($array);
    }, $arrays);
}

class MyClass {
    /* testBasicMethod */
    function myfunction () {}

    /* testPrivateStaticMethod */
    private static function myfunction () {}

    /* testFinalMethod */
    final public function myfunction () {}

    /* testProtectedReturnMethod */
    protected function myfunction () : int {}

    /* testPublicReturnMethod */
    public function myfunction () : array {}

    /* testNullableReturnMethod */
    public function myfunction () : ?array {}

    /* testMessyNullableReturnMethod */
    public function myfunction () /* comment
        */ :
        /* comment */ ? // phpcs:ignore Stnd.Cat.Sniff -- For reasons.
        array {}

    /* testReturnNamespace */
    function myfunction () : \MyNamespace\MyClass {}

    /* testReturnMultilineNamespace */
    // Parse error in PHP 8.0.
    function myfunction () : \MyNamespace /** comment *\/ comment */
                           \MyClass /* comment */
                           \Foo {}

    /* testReturnUnqualifiedName */
    private function myfunction () : ?MyClass {}

    /* testReturnPartiallyQualifiedName */
    function myfunction () : Sub\Level\MyClass {}
}

abstract class MyClass
{
    /* testAbstractMethod */
    abstract function myfunction ();

    /* testAbstractReturnMethod */
    abstract protected function myfunction () : bool;
}

interface MyInterface
{
    /* testInterfaceMethod */
    function myfunction ();
}

$result = array_map(
    /* testArrowFunction */
    static fn(int $number) : int => $number + 1,
    $numbers
);

class ReturnMe {
    /* testReturnTypeStatic */
    private function myfunction () : static {
        return $this;
    }
}

/* testPHP8MixedTypeHint */
function mixedTypeHint() :mixed {}

/* testPHP8MixedTypeHintNullable */
// Intentional fatal error - nullability is not allowed with mixed, but that's not the concern of the method.
function mixedTypeHintNullable() : ?mixed {}

/* testNamespaceOperatorTypeHint */
function namespaceOperatorTypeHint() : ?namespace\Name {}

/* testPHP8UnionTypesSimple */
function unionTypeSimple($number) : int|float {}

/* testPHP8UnionTypesTwoClasses */
$fn = fn($var) : MyClassA|\Package\MyClassB => $var;

/* testPHP8UnionTypesAllBaseTypes */
function unionTypesAllBaseTypes() : array|bool|callable|int|float|null|Object|string {}

/* testPHP8UnionTypesAllPseudoTypes */
// Intentional fatal error - mixing types which cannot be combined, but that's not the concern of the method.
function unionTypesAllPseudoTypes($var) : false|MIXED|self|parent|static|iterable|Resource|void {}

/* testPHP8UnionTypesNullable */
// Intentional fatal error - nullability is not allowed with union types, but that's not the concern of the method.
$closure = function () use($a) :?int|float {};

/* testPHP8PseudoTypeNull */
// PHP 8.0 - 8.1: Intentional fatal error - null pseudotype is only allowed in union types, but that's not the concern of the method.
function pseudoTypeNull() : null {}

/* testPHP8PseudoTypeFalse */
// PHP 8.0 - 8.1: Intentional fatal error - false pseudotype is only allowed in union types, but that's not the concern of the method.
function pseudoTypeFalse() : false {}

/* testPHP8PseudoTypeFalseAndBool */
// Intentional fatal error - false pseudotype is not allowed in combination with bool, but that's not the concern of the method.
function pseudoTypeFalseAndBool() : bool|false {}

/* testPHP8ObjectAndClass */
// Intentional fatal error - object is not allowed in combination with class name, but that's not the concern of the method.
function objectAndClass() : object|ClassName {}

/* testPHP8PseudoTypeIterableAndArray */
// Intentional fatal error - iterable pseudotype is not allowed in combination with array or Traversable, but that's not the concern of the method.
interface FooBar {
    public function pseudoTypeIterableAndArray() : iterable|array|Traversable;
}

/* testPHP8DuplicateTypeInUnionWhitespaceAndComment */
// Intentional fatal error - duplicate types are not allowed in union types, but that's not the concern of the method.
function duplicateTypeInUnion() : int | /*comment*/ string | INT {}

/* testPHP81NeverType */
function never() : never {}

/* testPHP81NullableNeverType */
// Intentional fatal error - nullability is not allowed with never, but that's not the concern of the method.
function nullableNever() : ?never {}

/* testPHP8IntersectionTypes */
function intersectionTypes() : Foo&Bar {}

/* testPHP81MoreIntersectionTypes */
function moreIntersectionTypes() : MyClassA&\Package\MyClassB&\Package\MyClassC {}

/* testPHP81IntersectionArrowFunction */
$fn = fn($var) : MyClassA&\Package\MyClassB => $var;

/* testPHP81IllegalIntersectionTypes */
// Intentional fatal error - simple types are not allowed with intersection types, but that's not the concern of the method.
$closure = function () : string&int {};

/* testPHP81NullableIntersectionTypes */
// Intentional fatal error - nullability is not allowed with intersection types, but that's not the concern of the method.
$closure = function () : ?Foo&Bar {};

/* testPHP82PseudoTypeTrue */
function pseudoTypeTrue() : ?true {}

/* testPHP82PseudoTypeFalseAndTrue */
// Intentional fatal error - Type contains both true and false, bool should be used instead, but that's not the concern of the method.
function pseudoTypeFalseAndTrue() : true|false {}

/* testNotAFunction */
return true;

/* testPhpcsIssue1264 */
function foo() : array {
    echo $foo;
}

/* testArrowFunctionArrayReturnValue */
$fn = fn() : array => [a($a, $b)];

/* testArrowFunctionReturnByRef */
fn&(?string $a) : ?string => $b;

/* testFunctionCallFnPHPCS353-354 */
$value = $obj->fn(true);

/* testFunctionDeclarationNestedInTernaryPHPCS2975 */
return (!$a ? [ new class { public function b() : c {} } ] : []);

/* testArrowFunctionLiveCoding */
// Intentional parse error. This has to be the last test in the file.
$fn = fn
