<?php

use App\Language;
use App\Room;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('LanguageTableSeeder');
        $this->call('UserTableSeeder');
    }

}

class LanguageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->delete();
        Language::create([
            'name'     => 'en',
            'fullname' => 'English'
        ]);

        Language::create([
            'name'     => 'fr',
            'fullname' => 'Français'
        ]);
    }
}

class UserTableSeeder extends Seeder
{
    public function run ()
    {
        DB::table('users')->delete();
        User::create([
            'username' => 'Extaze',
            'password' => \Hash::make('toor'),
            'email'    => 'test@mail.com',
            'language' => 1
        ]);
    }
}
