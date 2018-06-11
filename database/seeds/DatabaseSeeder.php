<?php

use Illuminate\Database\Seeder;
use \App\School;
use \App\User;
use \App\page;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call('UserAndSchoolSeeder');
        $this->command->info('Seeding has been completed.');


    }
}
    class UserAndSchoolSeeder extends Seeder {

        public function run(){

            DB::table('Users')->delete();
            DB::table('Schools')->delete();
    
    
            $school1 = School::create(array(
                'name' => 'Hogeschool Utrecht',
                'level' => 'hbo',
                'email_domain' => 'hu.nl'
            ));

            $school2 = School::create(array(
                'name' => 'cals college',
                'level' => 'anders',
                'email_domain' => 'cals.nl'
            ));

            $this->command->info('schools are created');

            $user1 = User::create([
                'name' => 'patrick',
                'email' => 'patrick.kottman@hu.nl',
                'password' => Hash::make('password'),
                'school_id' => $school1->id
            ]);

            $user2 = User::create([
                'name' => 'jan',
                'email' => 'jan.janssen@cals.nl',
                'password' => Hash::make('password'),
                'school_id' => $school2->id
            ]);
            $this->command->info('Users are alive and well');
            $homepage = Page::create([
                'name' => 'homepage'
            ]);
            $this->command->info('pages has been defined');
        }
    }

