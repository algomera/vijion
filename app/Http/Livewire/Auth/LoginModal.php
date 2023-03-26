<?php

	namespace App\Http\Livewire\Auth;

	use Illuminate\Support\Facades\Auth;
	use LivewireUI\Modal\ModalComponent;

	class LoginModal extends ModalComponent
	{
		public $email;
		public $password;
		protected $rules = [
			'email'    => 'required|email',
			'password' => 'required',
		];

		public function login() {
			$this->validate();
			if (Auth::attempt([
				'email'    => $this->email,
				'password' => $this->password
			])) {
				$this->closeModalWithEvents(['user-status-updated']);
			} else {
				session()->flash('error', 'Credenziali errate');
			}
		}

		public function render() {
			return view('livewire.auth.login-modal');
		}
	}
