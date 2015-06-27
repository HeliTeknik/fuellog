<?php

trait RegistersUser
{

    protected function register(array $overrides = [])
    {
        $user     = factory(Fuellog\User::class)->make($overrides);
        $password = str_random(10);

        $default = [
            'name'                  => $user->name,
            'email'                 => $user->email,
            'password'              => $password,
            'password_confirmation' => $password
        ];

        $credentials = array_merge($default, $overrides);

        return $this->visit('auth/register')
            ->submitForm('Register now', $credentials);
    }


    protected function createUser(array $overrides = [])
    {
        return factory(Fuellog\User::class)->create($overrides);
    }


}