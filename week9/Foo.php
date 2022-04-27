<?php

class Foo {

    private string $firstName;

    private string $lastName;

    public function setFirstName (string $firstName)
    {
        $this->firstName = $firstName;
    }
}

$a = new Foo();

$a->setFirstName('John');


$testArray = [1, 2, 10, 20];

count($testArray);

$range = range(1, 31);
