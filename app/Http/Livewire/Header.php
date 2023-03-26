<?php

	namespace App\Http\Livewire;

	use Illuminate\Support\Facades\Auth;
	use Livewire\Component;

	class Header extends Component
	{
		protected $listeners = [
			'user-status-updated' => '$refresh'
		];

		public function logout() {
			Auth::logout();

			$this->emitSelf('user-status-updated');
		}

		public function render() {
			return view('livewire.header');
		}
	}
