<?php

namespace App\Livewire;

use Livewire\Component;

class BananaGame extends Component
{
    public int $y = 0;
    public int $x = 0;
    public bool $gameOver = false;
    public bool $isFall = false;
    public bool $isFalling = false;
    public int $score = 0;
    public $maxHeight = 20;
    public $objects = [];

    public function yeetBanana()
    {
        $this->isFalling = false;
        $this->y += rand(100, 350);
        $this->x += rand(-100, 100);
        $this->score += $this->y / 10;
        $this->isFall = true;
    }

    public function gravity()
    {
        if ($this->isFall) {
            if ($this->y > 0) {

                // Adjust fall speed based on the height
                if ($this->y > 150 && $this->y <= 350) {
                    $this->isFalling = true;
                    $this->y -= max(2, ceil($this->y / 15)); // Slow fall
                } else {
                    $this->isFalling = true;
                    $this->y -= max(10, ceil($this->y / 8)); // Fast fall
                }
            } else {
                $this->y = 0; // Ensure it doesn't go below ground level
                $this->isFall = false;
                $this->isFalling = false;
                $this->gameOver = true;
            }
        }
    }



    public function resetGame()
    {
        $this->score = 0;
        $this->x = 0;
        $this->y = 0;
        $this->isFall = false;
        $this->gameOver = false;
    }

    public function render()
    {
        return view('livewire.banana-game');
    }
}
