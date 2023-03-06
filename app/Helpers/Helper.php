<?php

namespace App\Helpers;
use App\Models\User;

class Helper 
{

    public static function getNameById(int $user_id){
        return User::find($user_id)->name;
    }

}