<?php

namespace Database\Seeders;

use App\Models\Planning;
use Illuminate\Database\Seeder;

class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Planning::create([
            'user_id'          => '2',
            'title'   => 'Project EMR',
            'description'    => 'EMR',
            'category'    => 'hardware',
            'start_date'    => '2023-06-17',
            'end_date'    => '2023-06-20',
           
            'created_by'    => 'misdi',
          
            'updated_by'    => 'misdi',
        ]);
    }
}


