<?php

use App\Models\ItemSchema;
use Illuminate\Database\Seeder;

class ItemSchemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemSchema::create([
            'title' => 'Mklat Schema',
            'css_expression' => 'title[h2.post-title]||excerpt[p.post-excerpt]||image[img.wp-post-image[src]]||source_link[.post-title a[href]]',
            'full_content_selector' => '.entry-content',
            'is_full_url' => true
        ]);

        ItemSchema::create([
            'title' => 'Arab Media Society Schema',
            'css_expression' => 'title[h2.post-box-title]||excerpt[.entry > p]||image[img.wp-post-image[src]]||source_link[.post-box-title a[href]]',
            'full_content_selector' => '.entry',
            'is_full_url' => true
        ]);
    }
}
