<?php

use PHPUnit\Framework\ExpectationFailedException;

beforeEach(function () {
    $this->bar = 2;
    
});

it('gets executed before each test', function () {
    expect($this->bar)->toBe(2);

    $this->bar = 'changed';
});

it('gets executed before each test once again', function () {
    expect($this->bar)->toBe(2);
});

test('pass', function () {
    expect('1.1')->toBeString();
    expect(1.1)->not->toBeString();
});


