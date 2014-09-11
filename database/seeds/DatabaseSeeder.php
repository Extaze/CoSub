<?php

use App\Language;
use App\Room;
use App\User;
use App\Show;
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
        $this->call('ShowTableSeeder');
        $this->call('RoomTableSeeder');
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
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'username' => 'Extaze',
            'password' => 'toor',
            'email'    => 'test@mail.com',
            'language' => 1
        ]);
    }
}

class ShowTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('shows')->delete();
        Show::create([
            'name'       => 'Hannibal',
            'network'    => 'NBC',
            'started_at' => new DateTime('2013-04-04'),
            'duration'   => 43
        ]);
    }
}

class RoomTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->delete();
        Room::create([
            'name'        => 'Hannibal S01E01 - Apéritif',
            'show'        => 1,
            'language'    => 1,
            'season'      => '01',
            'episode'     => '01'
        ]);
    }
}