<?php

/**
 * asjhdakjdhs.
 */
trait LoginAsUser
{

    use RegistersUser;

    protected function login()
    {
        $user = $this->createUser();

        return $this->actingAs($user);
    }

}