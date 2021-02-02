<?php

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'title' => 'Mklat',
            'url' => 'https://www.mklat.com/',
            'logo' => '/images/Mklat-Logo-1.png'
        ]);

        Website::create([
            'title' => 'Arab Media Society',
            'url' => 'https://www.arabmediasociety.com/',
            'logo' => '/images/AMS_logoN.png'
        ]);
    }
}
