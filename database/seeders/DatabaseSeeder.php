<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;

use App\Models\User;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'id' => 1,
            'name' => 'pepito de la calzada',
            'email' => 'pepitodelacalzada@gmail.com',
            'is_admin' => true,
        ]); 
        User::factory(1)->create([
            'id' => 2,
            'name' => 'DJ Charquito',
            'email' => 'ahefny1987@gmail.com',
            'is_admin' => false,
        ]
        );
        User::factory(1)->create([
            'id' => 3,
            'name' => 'Mevoamata',
            'email' => 'andresp199519@gmail.com',
            'is_admin' => false,
        ]
        );

        User::factory(1)->create([
            'id' => 4,
            'name' => 'MapaAndriu',
            'email' => 'asuareztamayo@hotmail.com',
            'is_admin' => false,
        ]
        );

        User::factory(1)->create([
            'id' => 5,
            'name' => 'Gabi',
            'email' => 'gabispineiro@gmail.com',
            'is_admin' => false,
        ]
        );

        User::factory(1)->create([
            'id' => 6,
            'name' => 'David Sanchez',
            'email' => 'davidsanchezdiaz72@gmail.com',
            'is_admin' => false,
        ]
        );

        User::factory(5)->create();

        Course::factory(1)->create([
            'course_name' => 'Laravel',
            'image' => 'https://openexpoeurope.com/wp-content/uploads/2021/02/Laravel-Portada.jpg',
            'date' => '2021-05-20',
            'hour' => '08:30:00',
            'course_link' => 'https://openexpoeurope.com/wp-content/uploads/2021/02/Laravel-Portada.jpg',
            'favorite' => true,
            'num_max' => 10,
            'description' => 'Learn how to create a robust API in Laravel and a Single Page Application frontend in Vue.js!'

        ]);
        Course::factory(1)->create([
            'course_name' => 'Symfony',
            'image' => 'https://www.coriaweb.hosting/wp-content/uploads/2016/11/symfony_logo.png',
            'date' => '2021-07-20',
            'hour' => '12:30:00',
            'course_link' => 'https://www.coriaweb.hosting/wp-content/uploads/2016/11/symfony_logo.png',
            'favorite' => true,
            'num_max' => 12,
            'description' => 'Conocerás los conceptos básicos del framework Symfony. Configurar tu IDE PhpStorm para un rendimiento óptimo con Symfony'

        ]);
        Course::factory(1)->create([
            'course_name' => 'Php',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1067px-PHP-logo.svg.png',
            'date' => '2021-08-01',
            'hour' => '15:30:00',
            'course_link' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1067px-PHP-logo.svg.png',
            'favorite' => true,
            'num_max' => 1,
            'description' => 'Aprenderemos a hacer un CRUD vanilla con PHP, el curso tendrá una duración de 2h'

        ]);
        Course::factory(1)->create([
            'course_name' => 'Programming for Cats',
            'image' => 'https://1.bp.blogspot.com/-6AYOlKIRAns/WYiZ8lGfICI/AAAAAAAABTk/c6fzq1mX274z6P6eqE8oYipgTSllHeJ4ACLcBGAs/s1600/programando.gif',
            'date' => '2021-08-20',
            'hour' => '13:00:00',
            'course_link' => 'https://1.bp.blogspot.com/-6AYOlKIRAns/WYiZ8lGfICI/AAAAAAAABTk/c6fzq1mX274z6P6eqE8oYipgTSllHeJ4ACLcBGAs/s1600/programando.gif',
            'favorite' => true,
            'num_max' => 25,
            'description' => 'Berlín tambien quiere programar'

        ]);
        Course::factory(1)->create([
            'course_name' => 'Java Script',
            'image' => 'https://www.gesformacion.edu.es/img/course/247/curso-javascript.jpg',
            'date' => '2021-08-14',
            'hour' => '13:00:00',
            'course_link' => 'https://www.gesformacion.edu.es/img/course/247/curso-javascript.jpg',
            'favorite' => true,
            'num_max' => 17,
            'description' => 'La metodología de aprendizaje para el Curso de Fundamentos de JavaScript consiste en el estudio de los distintos temas en los que se estructura, así como en la realización de los supuestos prácticos en su caso.'

        ]);

        Course::factory(5)->create();

            Foreach (Course::all() as $course) {
            $users = User::inRandomOrder()->take(rand(1,10))->pluck('id');
            $course->users()->attach($users);
            }

    }

    
}
