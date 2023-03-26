<?php

	namespace App\Http\Livewire;

	use Illuminate\Support\Facades\Auth;
	use Livewire\Component;

	class Header extends Component
	{
		protected $listeners = [
			'logged-in' => '$refresh'
		];

		public function logout() {
			Auth::logout();

			$this->emit('$refresh');
		}

		public function render() {
			return view('livewire.header');
		}
	}
