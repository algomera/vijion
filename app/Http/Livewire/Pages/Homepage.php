<?php

namespace App\Http\Livewire\Pages;

use App\Models\HeroSlide;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.pages.homepage', [
			'slides' => HeroSlide::all()
        ])->layout('layouts.guest');
    }
}
