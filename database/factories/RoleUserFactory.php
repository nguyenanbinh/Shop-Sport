<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RoleUser;
use App\Models\User;
use App\Role;
use Faker\Generator as Faker;

$factory->define(RoleUser::class, function (Faker $faker) {
    $listUserIDs=User::take(5)->pluck('id');
    $listRoleIDs=Role::pluck('id');
    return [
        'user_id'=>$faker->randomElement($listUserIDs),
        'role_id'=>$faker->randomElement($listRoleIDs)
    ];
});
