<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('content');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('posts')->insert([
            'id' => 1,
            'title' => "Novak isn't popular at the moment",
            'content' =>
                'According to an Australian TV news poll, 75% of Australians want Novak Djokovic to piss off and go back home. Which raises a question... even if he DOES win his appeal to stay in the country, what chance does he now have to win the Australian Open?',
            'is_published' => true,
            'created_at' => '2022-01-17 15:34:25',
            'updated_at' => '2022-01-17 15:34:25',
        ]);
        DB::table('posts')->insert([
            'id' => 2,
            'title' => 'Tennis Australia admits they messed up.',
            'content' =>
                "Tennis Australia has admiited they advised Noak Djokovic to lie on his Visa application in an effort to circumvent Australia's tough COVID protection laws.",
            'is_published' => true,
            'created_at' => '2022-01-18 15:14:25',
            'updated_at' => '2022-01-18 15:14:25',
        ]);
    }
    public function down()
    {
        Schema::drop('posts');
    }
}
