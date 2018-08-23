<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FavouritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_can_not_favourite_anything()
    {
        $this->withExceptionHandling()
        ->post('replies/1/favourites')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_favourite_any_reply()
    {
        $this->signIn();

        $reply = factory('App\Reply')->create();
//        dd($reply);
        $this->post('replies/' . $reply->id . '/favourites');

        $this->assertCount(1, $reply->favourites);
    }

    /** @test */
    public function an_authenticated_user_may_only_favourite_a_reply_once()
    {
        $this->signIn();

        $reply = factory('App\Reply')->create();
//        dd($reply);
        try {
            $this->post('replies/' . $reply->id . '/favourites');
            $this->post('replies/' . $reply->id . '/favourites');
        } catch (\Exception $e) {
            $this->fail('Did not expect to insert the same record twice');
        }


        $this->assertCount(1, $reply->favourites);
    }

}