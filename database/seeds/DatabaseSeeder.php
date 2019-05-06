<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Room;
use App\Type;
use App\Item;
use App\Level;
use App\User;
use App\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        Level::create(['name'=>'admin']);
        Level::create(['name'=>'operator']);
        Level::create(['name'=>'maintainer']);

        User::create([
            'name'=>'Haikal Fikri Luzain',
            'email'=>'haikalfikriluzain@gmail.com',
            'password'=>Hash::make('123456'),
            'level_id'=>1,
        ]);

        User::create([
            'name'=>'Operator',
            'email'=>'operator@gmail.com',
            'password'=>Hash::make('123456'),
            'level_id'=>2,
        ]);

        User::create([
            'name'=>'Maintainer',
            'email'=>'maintainer@gmail.com',
            'password'=>Hash::make('123456'),
            'level_id'=>3,
        ]);

        for($i = 1;$i<=10;$i++)
        {
            Room::create([
                'name'=>"Ruang - ".$i,
                // 'code'=>'R00'.$i,
                'info'=>$faker->address,
            ]);

            Type::create([
                'name'=>"Type - ".$i,
                // 'code'=>'T00 '.$i,
                'info'=>$faker->address,
            ]);

            $item = ['','Kursi','Meja','Piring','Garpu','Sendok','Taplak','Panci','Handphone','Laptop','Komputer'];

            Item::create([
                'name'=>$item[$i],
                'condition'=>'good',
                'qty'=>10,
                'info'=>$faker->text,
                // 'code'=>'A00'.$i,
                'type_id'=>$i,
                'room_id'=>$i,
                'registration_date'=>Carbon::now(),
                'officer_id'=>1,
            ]);

            Employee::create([
                'name'=>$faker->name,
                'address'=>$faker->address,
                'nip'=>11605501 + $i,
                'username'=>11605501 + $i,
                'password'=>Hash::make(11605501 + $i),
            ]);
        }
    }
}
