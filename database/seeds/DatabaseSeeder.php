<?php

use Illuminate\Database\Seeder;

use \App\User;
use \App\page;
use \App\Group;
use \App\Admin;
use \App\Member;
use \App\Survey;
use \App\Question;
use \App\survey_group;
use \App\Answer;
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







            $user1 = User::create([
                'username' => 'Patrick Kottman',
                'email' => 'patrick.kottman@student.hu.nl',
                'password' => Hash::make('password')
            ]);

            $user2 = User::create([
                'username' => 'Jan van Basten',
                'email' => 'jan.janssen@cals.nl',
                'password' => Hash::make('password')

            ]);

            $user3 = User::create([
                'username' => 'Tim van de Looy',
                'email' => 'tim.vandelooy@student.hu.nl',
                'password' => Hash::make('password')
            ]);

            $user4 = User::create([
                'username' => 'Peter Paul',
                'email' => 'Peter.Paul@teacher.rws.com',
                'password' => Hash::make('password')

            ]);

            $user5 = User::create([
                'username' => 'Tim van Dam',
                'email' => 'tim.vandam@student.hu.nl',
                'password' => Hash::make('password')
            ]);

            $user6 = User::create([
                'username' => 'Daan blijenberg',
                'email' => 'daan.blijenberg@student.rws.nl',
                'password' => Hash::make('password')

            ]);

            $user7 = User::create([
                'username' => 'Timon de Slimme',
                'email' => 'timon.deslimme@leraar.hu.nl',
                'password' => Hash::make('password')
            ]);

            $user8 = User::create([
                'username' => 'Andrea Rodriquez',
                'email' => 'Andrea.Rodriquez@leraar.rws.nl',
                'password' => Hash::make('password')

            ]);
            $user9 = User::create([
                'username' => 'Stef Kottman',
                'email' => 'steff.kottman@student.has.nl',
                'password' => Hash::make('password')
            ]);

            $user10 = User::create([
                'username' => 'Ronald de Ronde',
                'email' => 'Ronald.deronde@student.rws.nl',
                'password' => Hash::make('password')

            ]);

            $user11 = User::create([
                'username' => 'Bob roze',
                'email' => 'bob.roze@student.hu.nl',
                'password' => Hash::make('password')
            ]);

            $user12 = User::create([
                'username' => 'Tim van de berg',
                'email' => 'tim.vandeberg@student.rws.nl',
                'password' => Hash::make('password')

            ]);

            $admin = Admin::create([
                'username' => 'admin',
                'email' => 'admin.admin@admin.nl',
                'password' => Hash::make('password')

            ]);

            $this->command->info('Users are alive and well');

            $homepage = Page::create([
                'name' => 'homepage'
            ]);
            $startpage = Page::create([
                'name' => 'startpage'
            ]);
            $contactpage = Page::create([
                'name' => 'adminhomepage'
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

            $member1 = Member::create([
              'group_id' => 1,
              'user_id' => 1,
              'group_leader' => 1
            ]);

            $member2 = Member::create([
              'group_id' => 3,
              'user_id' => 1,
              'group_leader' => 0
            ]);

            $member3 = Member::create([
              'group_id' => 4,
              'user_id' => 1,
              'group_leader' => 0
            ]);

            $member4 = Member::create([
              'group_id' => 1,
              'user_id' => 2,
              'group_leader' => 0
            ]);

            $member5 = Member::create([
              'group_id' => 1,
              'user_id' => 3,
              'group_leader' => 0
            ]);

            $member6 = Member::create([
              'group_id' => 1,
              'user_id' => 5,
              'group_leader' => 0
            ]);

            $member7 = Member::create([
              'group_id' => 1,
              'user_id' => 11,
              'group_leader' => 0
            ]);

            $member8 = Member::create([
              'group_id' => 4,
              'user_id' => 11,
              'group_leader' => 1
            ]);

            $member9 = Member::create([
              'group_id' => 4,
              'user_id' => 12,
              'group_leader' => 0
            ]);

            $member10 = Member::create([
              'group_id' => 3,
              'user_id' => 6,
              'group_leader' => 1
            ]);

            $member11 = Member::create([
              'group_id' => 2,
              'user_id' => 4,
              'group_leader' => 1
            ]);

            $this->command->info('members have been created');

            $survey1 = Survey::create([
                'title' => 'testsurvey',
                'description' => 'testdescription'

            ]);
            $question1 = Question::create([
               'survey_id' => $survey1->id,
               'type' => 'Text',
               'title' => 'Wat is uw ervaring met deze applicatie?',
               'description' => 'geef uw eerste mening van deze applicatie.',
               'attributes' => '[]'

            ]);
            $question2 = Question::create([
               'survey_id' => $survey1->id,
               'type' => 'Text',
               'title' => 'Hoe snel werkt deze applicatie?',
               'description' => 'Is de applicatie traag op bepaalde plekken en waar?',
               'attributes' => '[]'

            ]);
            $question3 = Question::create([
               'survey_id' => $survey1->id,
               'type' => 'Text',
               'title' => 'Dit is een vraag waar je geen antwoord op geeft voor testen?',
               'description' => 'Test vraag Test vraag Test vraag Test vraag Test vraag ',
               'attributes' => '[]'

            ]);
            $question4 = Question::create([
               'survey_id' => $survey1->id,
               'type' => 'Slider',
               'title' => 'Wat vind je van deze slider?',
               'description' => 'Aan het begin betekent heel slecht aan het eind heel goed. Geef je eerlijke mening graag!',
               'attributes' => '{"end": "top", "start": "slecht", "middle": "matig"}'

            ]);
            $question5 = Question::create([
               'survey_id' => $survey1->id,
               'type' => 'Slider',
               'title' => 'Vind je sliders in vragenlijsten nodig?',
               'description' => 'Aan het begin betekent heel slecht aan het eind heel goed. Geef je eerlijke mening graag!',
               'attributes' => '{"end": "echt wel", "start": "echt niet", "middle": "soms"}'

            ]);
            $question6 = Question::create([
               'survey_id' => $survey1->id,
               'type' => 'Radio',
               'title' => 'Wat als radio buttons niet bestonden?',
               'description' => 'Radio buttons zijn een belangrijke toevoeging aan deze vragenlijst. selecteer er een om antwoord te geven!',
               'attributes' => '{"fifth": "Dan waren vragenlijsten minder nuttig geweest", "first": "Dan hadden we nog bullet points", "third": "Dan waren er geen radio buttons", "fourth": "Vragenlijsten kunnen best zonder", "second": "Dan geef ik geen antwoord op vragenlijsten"}'

            ]);

            $group_survey1 = survey_group::create([
                'survey_id' => $survey1->id,
                'group_id' => $group1->id
            ]);

            $app = app();

            $answerObject = $app->make('stdClass');
            $questionObject = $app->make('stdClass');

            $questionObject->id = $question1->id;
            $questionObject->value = "De applicatie is duidelijk genoeg om er mee te werken.";
            $answers = collect([]);
            $answers->push($questionObject);

            $answerObject->answers = $answers;

            $answer1 = Answer::create([
                'user_id' => $user1->id,
                'survey_id' => $survey1->id,
                'answers'=> json_encode($answerObject)
            ]);

            $answerObject1 = $app->make('stdClass');
            $questionObject1 = $app->make('stdClass');

            $questionObject1->id = $question1->id;
            $questionObject1->value = "Deze applicatie werkt goed.";
            $answers1 = collect([]);
            $answers1->push($questionObject1);

            $answerObject1->answers1 = $answers1;

            $answer2 = Answer::create([
                'user_id' => $user2->id,
                'survey_id' => $survey1->id,
                'answers'=> json_encode($answerObject1)
            ]);

            $answerObject2 = $app->make('stdClass');
            $questionObject2 = $app->make('stdClass');

            $questionObject2->id = $question1->id;
            $questionObject2->value = "Ik denk dat ik deze applicatie gebruik in verschillende situaties.";
            $answers2 = collect([]);
            $answers2->push($questionObject2);

            $answerObject2->answers2 = $answers2;

            $answer3 = Answer::create([
                'user_id' => $user3->id,
                'survey_id' => $survey1->id,
                'answers'=> json_encode($answerObject2)
            ]);

            $answerObject3 = $app->make('stdClass');
            $questionObject3 = $app->make('stdClass');

            $questionObject3->id = $question1->id;
            $questionObject3->value = "Deze applicatie had betere styling mogen hebben.";
            $answers3 = collect([]);
            $answers3->push($questionObject3);

            $answerObject3->answers3 = $answers3;

            $answer4 = Answer::create([
                'user_id' => $user4->id,
                'survey_id' => $survey1->id,
                'answers'=> json_encode($answerObject3)
            ]);

            $answerObject4 = $app->make('stdClass');
            $questionObject4 = $app->make('stdClass');

            $questionObject4->id = $question1->id;
            $questionObject4->value = "Wauw dit overzicht werkt eindelijk!";
            $answers4 = collect([]);
            $answers4->push($questionObject4);

            $answerObject4->answers4 = $answers4;

            $answer5 = Answer::create([
                'user_id' => $user5->id,
                'survey_id' => $survey1->id,
                'answers'=> json_encode($answerObject4)
            ]);

            $answerObject5 = $app->make('stdClass');
            $questionObject5 = $app->make('stdClass');

            $questionObject5->id = $question2->id;
            $questionObject5->value = "Ik ben de eerste die hier antwoord op heeft gegeven";
            $answers5 = collect([]);
            $answers5->push($questionObject5);

            $answerObject5->answers5 = $answers5;

            $answer6 = Answer::create([
                'user_id' => $user6->id,
                'survey_id' => $survey1->id,
                'answers'=> json_encode($answerObject5)
            ]);
        }
    }
