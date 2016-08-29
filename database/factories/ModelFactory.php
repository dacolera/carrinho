<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Ecommerce\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Ecommerce\Produtos::class, function (Faker\Generator $faker) {

    return [
        'nome' => $faker->firstname,
        'descricao' => $faker->text,
        'id_categoria' => $faker->numberBetween(1, 10),
        'preco' => $faker->randomFloat(2, 23, 4000)
    ];
});

$factory->define(Ecommerce\Categorias::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->firstname  
    ];
});
