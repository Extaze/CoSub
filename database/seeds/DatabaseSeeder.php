<?php

use App\Language;
use App\Room;
use App\RoomMember;
use App\RoomRight;
use App\User;
use App\Screenplay;
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
        $this->call('RoomRightsTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('ScreenplayTableSeeder');
        $this->call('RoomTableSeeder');
        $this->call('RoomMembersTableSeeder');
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

class RoomRightsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('room_rights')->delete();
        RoomRight::create([
            'name' => 'cosub.administrator'
        ]);
        RoomRight::create([
            'name' => 'cosub.member'
        ]);
        RoomRight::create([
            'name' => 'cosub.translater'
        ]);
        RoomRight::create([
            'name' => 'cosub.timer'
        ]);
        RoomRight::create([
            'name' => 'cosub.observer'
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

class ScreenplayTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('screenplays')->delete();
        Screenplay::create([
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
            'screenplay'        => 1,
            'language'    => 1,
            'season'      => '01',
            'episode'     => '01'
        ]);
    }
}

class RoomMembersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('room_members')->delete();
        RoomMember::create([
            'user'   => 1,
            'room'   => 1,
            'rights' => 1
        ]);
    }
}