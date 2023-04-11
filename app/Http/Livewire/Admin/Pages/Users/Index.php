<?php

	namespace App\Http\Livewire\Admin\Pages\Users;

	use App\Models\User;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Index extends Component
	{
		use WithPagination;

		public $search;

		public function show(User $user) {
			return redirect()->route('users.show', $user->id);
		}

		public function render() {
			$users = User::with('roles');
			if ($this->search) {
				$users->where('first_name', 'like', '%' . $this->search . '%')->orWhere('last_name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%');
			}
			return view('livewire.admin.pages.users.index', [
				'users' => $users->paginate(25)
			]);
		}
	}
