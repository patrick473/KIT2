<?php

use Illuminate\Database\Seeder;
use \App\School;
use \App\User;
use \App\page;
use \App\Group;
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
            $startpage = Page::create([
                'name' => 'startpage'
            ]);
            $contactpage = Page::create([
                'name' => 'contactpage'
            ]);
            $this->command->info('pages has been defined');

            
            $group1 = Group::create([
                'title' =>'groep1',
                'description' =>'Leverage agile frameworks to provide a robust synopsis for high level overviews.
                 Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.
                 Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment'
            ]);
            $group2 = Group::create([
                'title' =>'groep2',
                'description' =>'Bring to the table win-win survival strategies to ensure proactive domination.
                 At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.
                 User generated content in real-time will have multiple touchpoints for offshoring.'
            ]);
            $group3 = Group::create([
                'title' =>'groep3',
                'description' =>'Capitalize on low hanging fruit to identify a ballpark value added activity to beta test.
                 Override the digital divide with additional clickthroughs from DevOps.
                 Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.'
            ]);
            $group4 = Group::create([
                'title' =>'groep4',
                'description' =>'Podcasting operational change management inside of workflows to establish a framework.
                 Taking seamless key performance indicators offline to maximise the long tail.
                 Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.'
            ]);
            $this->command->info('groups have been created');
        }
    }

