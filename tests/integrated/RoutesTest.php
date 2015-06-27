<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
    /**
     * @test
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Fuellog')
            ->seePageIs('/');
    }

    /**
     * @test
     */
    public function it_loads_register_view()
    {
        $this->visit('/')
            ->click('Sign Up')
            ->see('Register')
            ->seePageIs('auth/register');
    }

    /**
     * @test
     */
    public function it_loads_login_view()
    {
        $this->visit('/')
            ->click('Login')
            ->see('Login')
            ->seePageIs('auth/login');
    }

}
