<?php

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            'url' => 'https://www.mklat.com/category/technology/computer-internet/',
            'main_filter_selector' => '.mag-box-container .post-item',
            'website_id' => 1,
            'item_schema_id' => 1
        ]);

        Link::create([
            'url' => 'https://www.arabmediasociety.com/category/features/',
            'main_filter_selector' => '.post-listing .item-list',
            'website_id' => 2,
            'item_schema_id' => 2
        ]);
    }
}
