<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $faker=Faker::create('pl_PL');
        $numberUsers=20;

        for($i=1;$i<=$numberUsers;$i++){

       //  	if($i===1){
       //  		DB::table('users')->insert([
			    // 'name'=>'Patryk Partyn';
			    // 'email'=>'patryk.partyn@gmail.com',
			    // 'sex'=>'m',			    
			    // 'password'=>bcryot('pass'),
			    //     ]);
       //  		break;
       //  	}else{





        	$sex=$faker->randomElement(['m','f']);
        	switch($sex){

        		case 'm':
			 	$name=$faker->firstNameMale . ' ' . $faker->lastNameMale;
                $avatar= json_decode(file_get_contents('https://randomuser.me/api/?gender=male'))->results[0]->picture->large;

			 	break;

        		case 'f':
        		$name=$faker->firstNameFemale . ' ' . $faker->lastNameFemale;
                $avatar= json_decode(file_get_contents('https://randomuser.me/api/?gender=female'))->results[0]->picture->large;

        		break;
        	}
        	DB::table('users')->insert([
			    'name'=>$name,
			    'email'=>str_replace('-', '',str_slug($name)).'@'.$faker->safeEmailDomain,
			    'sex'=>$sex,	
                'avatar'=>$avatar,		    
			    'password'=>bcrypt('pass')
			        ]);
        		
       // }
        }
       
		
    }
}
