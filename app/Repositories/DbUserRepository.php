<?php

namespace App\Repositories;

//agreements/contracts
//if want to implement interface, offer methods
class DbUserRepository implements UserRepository
{
    public function create($attributes){
        dd('Creating User');
    }
}