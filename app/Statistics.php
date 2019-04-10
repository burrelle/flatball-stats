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

    public function scopeCompletions($query, $passerId)
    {
        return $query
            ->where('passer_id', $passerId)
            ->get()
            ->sum('catch');
    }

    public function scopeThrowaways($query, $passerId)
    {
        return $query
            ->where('passer_id', $passerId)
            ->get()
            ->sum('throwaway');
    }

    public function scopeAssists($query, $passerId)
    {
        return $query
            ->where('passer_id', $passerId)
            ->get()
            ->sum('goal');
    }

    public function scopePassingPercentage($query, $passerId)
    {
        $completions = $this->scopeCompletions($query, $passerId);
        $throwaways = $this->scopeThrowaways($query, $passerId);

        if ($completions === 0 && $throwaways === 0) {
            return 0;
        }

        return round(($completions / ($completions + $throwaways)) * 100);
    }

    public function scopeGoals($query, $receiverId)
    {
        return $query
            ->where('receiver_id', $receiverId)
            ->get()
            ->sum('goal');
    }

    public function scopeCatches($query, $receiverId)
    {
        return $query
            ->where('receiver_id', $receiverId)
            ->get()
            ->sum('catch');
    }

    public function scopeDrops($query, $receiverId)
    {
        return $query
            ->where('receiver_id', $receiverId)
            ->get()
            ->sum('drop');
    }

    public function scopeCatchingPercentage($query, $receiverId)
    {
        $catches = $this->scopeCatches($query, $receiverId);
        $drops = $this->scopeDrops($query, $receiverId);

        if ($catches === 0 && $drops === 0) {
            return 0;
        }

        return round(($catches / ($catches + $drops)) * 100);
    }
}
