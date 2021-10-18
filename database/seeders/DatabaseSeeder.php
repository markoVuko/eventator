<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for($i=0;$i<10;$i++){
            DB::table('events')->insert([
                'name' => 'Event '.Str::random(10)
            ]);
        }

        for($i=0;$i<50;$i++){
            $d = str_replace('/','-',Hash::make(Carbon::now()->timestamp));
            DB::table('tickets')->insert([
                'id' => 'tckt21lrv'.$d,
                'event_id' => $this->randomEventId(),
                'status' => rand(0,1)
            ]);
        }
    }

    protected function randomEventId(){
        $event = Event::inRandomOrder()->first();
        return $event->id;
    }
}
