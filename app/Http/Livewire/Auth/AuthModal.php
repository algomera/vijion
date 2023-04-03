<?php

	namespace App\Http\Livewire\Auth;

	use App\Models\User;
	use Illuminate\Auth\Events\Registered;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Hash;
	use LivewireUI\Modal\ModalComponent;

	class AuthModal extends ModalComponent
	{
		public $first_name;
		public $last_name;
		public $email;
		public $password;
		public $password_confirmation;
		public $tabs = [
			'login'    => 'accedi',
			'register' => 'registrati'
		];
		public $currentTab = 'login';
		//		protected $rules = [
		//			'email'    => 'required|email',
		//			'password' => 'required',
		//		];
		public static function modalMaxWidth(): string {
			return 'xl';
		}

		public function updatedCurrentTab() {
			$this->reset([
				'email',
				'password'
			]);
		}

		public function login() {
			$this->validate([
				'email'    => 'required|email',
				'password' => 'required',
			]);
			if (Auth::attempt([
				'email'    => $this->email,
				'password' => $this->password
			])) {
				$this->closeModalWithEvents(['user-status-updated']);
			} else {
				session()->flash('error', 'Credenziali errate');
			}
		}

		public function register() {
			$this->validate([
				'first_name' => 'required',
				'last_name'  => 'required',
				'email'      => 'required|email|unique:users,email',
				'password'   => 'required|confirmed',
			]);
			$user = User::create([
				'first_name' => $this->first_name,
				'last_name'  => $this->last_name,
				'email'      => $this->email,
				'password'   => Hash::make($this->password),
				'coins'      => 0,
			]);
			event(new Registered($user));
			Auth::login($user);
			$this->closeModalWithEvents(['user-status-updated']);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Benvenuto ' . $user->first_name),
				'subtitle' => __('Grazie per esserti iscritto a VIJI-STORE'),
				'type' => 'success',
			]);
		}

		public function render() {
			return view('livewire.auth.auth-modal');
		}
	}
