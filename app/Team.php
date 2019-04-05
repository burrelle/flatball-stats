<?php

namespace App;

use App\Player;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function getHandlers()
    {
        return $this->players->filter(function($player){
            return $player->position === 'handler';
        });
    }

    public function getCutters()
    {
        return $this->players->filter(function($player){
            return $player->position === 'cutter';
        });
    }
}
