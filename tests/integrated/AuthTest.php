<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions, RegistersUser;

    /**
     * @test
     */
    public function it_fails_register_validation()
    {
        $this->visit('auth/register')
            ->see('Username')
            ->submitForm('Register now', [
                'name'  => 'trash',
                'email' => 'trash@wnx.ch'
            ])
             ->seePageIs('auth/register');
    }

    /**
     * @test
     */
    public function it_show_validation_errors()
    {
        $user = factory(Fuellog\User::class)->create();

        $this->register(['email' => $user->email])
            ->seePageIs('auth/register')
            ->see("The email has already been taken.");
    }

    /**
     * @test
     */
    public function it_succeds_registration()
    {
        $this->register()
            ->seePageIs('/')
            ->see("Create your first vehicle");
    }

    /**
     * @test
     */
    public function it_logsout()
    {
        $this->register()->visit('auth/logout')->seePageIs('/')->see("Keep track of your fueling expenses.");
    }

}
