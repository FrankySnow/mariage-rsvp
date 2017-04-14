<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DisablesExceptionHandling;    

    public function setUp()
    {
        parent::setUp();

        $this->faker = \Faker\Factory::create();

        $this->disableExceptionHandling();
    }
}
