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
        for($i=0;$i<500;$i++){
            DB::table('events')->insert([
                'name' => 'Event '.Str::random(10),
                'created_at' => date("y-m-d h:m:s", time())
            ]);
        }

        for($i=0;$i<2000;$i++){
            $d = str_replace('/','-',Hash::make(Carbon::now()->timestamp));
            DB::table('tickets')->insert([
                'id' => 'tckt21lrv'.$d,
                'event_id' => $this->randomEventId(),
                'status' => rand(0,1),
                'created_at' => date("y-m-d h:m:s", time())
            ]);
        }
    }

    protected function randomEventId(){
        $event = Event::inRandomOrder()->first();
        return $event->id;
    }
}
