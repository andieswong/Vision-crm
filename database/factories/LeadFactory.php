<?php

use Faker\Generator as Faker;

$factory->define(App\Lead::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'direccion' => $faker->address,
        'ciudad' => $faker->city,
        'estado' => $faker->country,
        'tel' => $faker->phoneNumber,
        'tel_adic' => $faker->phoneNumber,
        'fecha_nac' => $faker->date(),
        'ssn' => $faker->numberBetween(111111111, 999999999),
        'card' =>$faker->creditCardNumber,
        'exp' => $faker->creditCardExpirationDate,
        'code' => $faker->numberBetween(111, 999),
        'paq_ofrecido' => 'Dl2',
        'tvs_inst' => $faker->numberBetween(1, 6),
        'dvr' => 'no',
        'horario_inst' => $faker->numberBetween(1111, 5555),
        'descuento' => $faker->numberBetween(10, 50),
        'servicios_adic' => 'no',
        'compania_act' => 'Dtv',
        'cod' => 'si',
        'notas' => $faker->realText(100),
        'estado_lead' => 'test',
        'user_id' => $faker->numberBetween(1, 50),
        'servicio_ai' => 'Dish',
    ];
});
