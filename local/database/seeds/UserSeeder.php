<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userRole = Role::whereName('user')->first();
        $group =  9;
        

        $user = User::create(array(
            'group_id'		=> $group,
            'name'    		=> 'Purna Dangal',
            'email'         => 'purna.dangal@outlook.com',
            'password'      => Hash::make('Sw33th3@rt'),
            'published'		=> 1
        ));
        $user->assignRole($adminRole);

        $user = User::create(array(
            'group_id'		=> $group,
            'name'    		=> 'Purna Bahadur Dangal',
            'email'         => 'lovelypurna@gmail.com',
            'password'      => Hash::make('kathmandu'),
            'published'		=> 1
        ));
        $user->assignRole($userRole);
    }
}
