<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Client;
use App\Worklog;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('ClientTableSeeder');
        $this->command->info('Client table seeded!');

        $this->call('WorklogTableSeeder');
        $this->command->info('Worklog table seeded!');
	}

}

class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'firstname' => 'Bo',
            'lastname' => 'Gunnarson',
            'company' => 'GetWebbed',
            'email' => 'info@getwebbed.dk',
            'password' => bcrypt('password'),
            'user_type' => 'superadmin'
        ]);

        User::create([
            'firstname' => 'Lene',
            'lastname' => 'Gunnarson',
            'company' => 'LPG Bogføring',
            'email' => 'lene@lpgaccount.dk',
            'password' => bcrypt('password'),
            'user_type' => 'admin'
        ]);
    }
}

class ClientTableSeeder extends Seeder {
    public function run()
    {
        DB::table('clients')->delete();

        Client::create([
            'fk_user' => 2,
            'firstname' => 'Lars',
            'lastname' => 'Søndergård',
            'company' => 'SignWork',
            'email' => 'lars@signwork.dk',
            'phone' => 11223344,
            'client_type' => 'company',
            'vat_number' => 55667788,
            'street' => 'Brøndbyvej 3',
            'zipcode' => 2600,
            'city' => 'Glostrup',
        ]);

        Client::create([
            'fk_user' => 2,
            'firstname' => 'Lars',
            'lastname' => 'Larsen',
            'company' => 'Jysk',
            'email' => 'jysk@jysk.dk',
            'phone' => 11223344,
            'client_type' => 'company',
            'vat_number' => 55667799,
            'street' => 'Stenager 5',
            'zipcode' => 3600,
            'city' => 'Frederikssund',
        ]);
    }
}

class WorklogTableSeeder extends Seeder {
    public function run()
    {
        DB::table('worklog')->delete();

        Worklog::create([
            'fk_client' => 1,
            'fk_user' => 2,
            'hours_used' => '3.75',
            'note' => 'Momsregnskaber færdiggjort og sendt til SKAT',
            'work_date_end' => '2015-04-05 13:45:00',
            'work_date_start' => '2015-04-05 12:45:00',
            'odometer_start' => 30400,
            'odometer_end' => 30410,
            'kilometers' => 10
        ]);

        Worklog::create([
            'fk_client' => 1,
            'fk_user' => 2,
            'hours_used' => '1.25',
            'note' => 'Tastet bilag i lange baner som var et værre rod',
            'work_date_end' => '2015-4-5 13:45',
            'work_date_start' => '2015-4-5 12:45',
            'odometer_start' => 30400,
            'odometer_end' => 30410,
            'kilometers' => 10
        ]);
    }
}
