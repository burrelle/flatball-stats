<?php

namespace App;

use App\Game;
use App\Player;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $guarded = [];

    public function passer()
    {
        return $this->belongsTo(Player::class, 'passer_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Player::class, 'receiver_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
