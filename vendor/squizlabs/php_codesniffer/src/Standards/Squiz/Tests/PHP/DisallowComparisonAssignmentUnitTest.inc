<?php
$var = TRUE;
$var = ($foo === $bar);
$var = ($foo * $bar);
$var = !$foo;
$var = ($foo || $bar);
$var = ($foo === TRUE);
$var = ($foo === TRUE
        || $bar === FALSE);
$var = (!$foo);

$var = is_array($foo);
$var = myfunction ($one, $two);
$var = myfunction (
        'one',
        'two'
       );

for ($i = ($stackPtr + 1); $i < $endStatement; $i++) {
}

// These conditions are allowed by this sniff.
$var = myfunction (!$var);

$depthAdv = array(
             $this,
             !$directLinks,
             FALSE,
            );

$var = myfunction (
    $var,
    array(
     $this,
     !$directLinks,
     FALSE,
    );
);

for ($node = $fieldsTag->nextSibling; $node; $node = $node->nextSibling) {
    if ($node->nodeType !== XML_ELEMENT_NODE) {
        continue;
    }

    for ($node = $fields->nextSibling; $node; $node = $node->nextSibling) {
        if ($node->nodeType !== XML_ELEMENT_NODE) {
            continue;
        }
    }
}

$a = $b ? $c : $d;
$a = $b === true ? $c : $d;

$this->_args = $this->_getArgs(($_SERVER['argv'] ?? []));
$args = ($_SERVER['argv'] ?? []);

$a = [
    'a' => ($foo) ? $foo : $bar,
];

$a = [
    'a' => ($foo) ? fn() => return 1 : fn() => return 2,
];

$var = $foo->something(!$var);
$var = $foo?->something(!$var);

$callback = function ($value) {
    if ($value > 10) {
        return false;
    }
};

function issue3616() {
    $food = 'cake';

    $returnValue = match (true) {
        $food === 'apple' => 'This food is an apple',
        $food === 'bar' => 'This food is a bar',
        $food === 'cake' => 'This food is a cake',
    };
}
