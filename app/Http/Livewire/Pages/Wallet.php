<?php

	namespace App\Http\Livewire\Pages;

	use Livewire\Component;

	class Wallet extends Component
	{
		public function render() {
			return view('livewire.pages.wallet', [
				'purchases' => auth()->user()->purchases()->latest('purchased_at')->get()
			])->layout('layouts.guest');
		}
	}
