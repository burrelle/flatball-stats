<?php

namespace Tests\Feature;

use App\User;
use App\Player;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddPlayerTest extends TestCase
{
    use RefreshDatabase;

    private function validParams($overrides = [])
    {
        return array_merge([
            'team_id' => 1,
            'name' => 'Fris Bee',
            'number' => 42,
            'position' => 'handler',
            'gender' => 'male'
        ], $overrides);
    }

    /** @test */
    public function UserCanViewAddTeamForm()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/players/new');
        $response->assertStatus(200);
    }

    /** @test */
    public function NotLoggedInUserIsRedirectedToLogin()
    {
        $response = $this->get('/players/new');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function addingValidTeam()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/players', [
            'team_id' => 1,
            'name' => 'Fris Bee',
            'number' => 42,
            'position' => 'handler',
            'gender' => 'male'
        ]);
        tap(Player::first(), function ($player) use ($user, $response) {
            $response->assertStatus(302);
            $response->assertRedirect("/teams");
            $this->assertEquals(1, $player->team_id);
            $this->assertEquals('Fris Bee', $player->name);
            $this->assertEquals(42, $player->number);
            $this->assertEquals('handler', $player->position);
            $this->assertEquals('male', $player->gender);
        });
    }

    /** @test */
    public function teamIdIsRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/players', $this->validParams([
            'team_id' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('team_id');
        $this->assertEquals(0, Player::count());
    }

    /** @test */
    public function nameRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/players', $this->validParams([
            'name' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('name');
        $this->assertEquals(0, Player::count());
    }

    /** @test */
    public function numberRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/players', $this->validParams([
            'number' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('number');
        $this->assertEquals(0, Player::count());
    }

    /** @test */
    public function numberIsIntegerRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/players', $this->validParams([
            'number' => 'not-an-integer',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('number');
        $this->assertEquals(0, Player::count());
    }

    /** @test */
    public function positionRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/players', $this->validParams([
            'position' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('position');
        $this->assertEquals(0, Player::count());
    }

    /** @test */
    public function genderRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/players', $this->validParams([
            'gender' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('gender');
        $this->assertEquals(0, Player::count());
    }
}
