<?php

	namespace App\Http\Livewire\Admin\Pages\Users;

	use App\Models\User;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Index extends Component
	{
		use WithPagination;

		public $search;

		public function render() {
			$users = User::query();
			if ($this->search) {
				$users->where('first_name', 'like', '%' . $this->search . '%')->orWhere('last_name', 'like', '%' . $this->search . '%');
			}
			return view('livewire.admin.pages.users.index', [
				'users' => $users->paginate(25)
			]);
		}
	}
