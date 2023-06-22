<?php

    namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HeroSlider;

    use App\Models\HeroSlide;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    use Livewire\WithFileUploads;
    use LivewireUI\Modal\ModalComponent;

    class EditSlide extends ModalComponent
    {
        use WithFileUploads;

        public $slide;

        public $background_url;

        public $lang = 'it';

        public static function modalMaxWidth(): string
        {
            return '5xl';
        }

        protected function rules()
        {
            return [
                'slide.visible_it' => 'boolean',
                'slide.visible_en' => 'boolean',
                'slide.paragraph_it' => 'required',
                'slide.paragraph_en' => 'nullable',
                'slide.btn_text_it' => 'required',
                'slide.btn_text_en' => 'nullable',
                'slide.btn_url' => 'required',
                'slide.small_centered_text_it' => 'required',
                'slide.small_centered_text_en' => 'nullable',
                'slide.big_centered_text' => 'required',
                'slide.coins_centered_text' => 'required',
            ];
        }

        public function mount(HeroSlide $slide)
        {
            $this->slide = $slide;
        }

        public function save()
        {
            $this->validate();
            $uuid = Str::uuid();
            if ($this->background_url) {
                $this->validate([
                    'background_url' => 'image|max:1024'
                ]);
                $filename = $this->background_url->getClientOriginalName();
                $ext = substr(strrchr($filename, '.'), 1);
                $bg_path = Storage::disk('public')->putFileAs('storage/hero-slides', $this->background_url, Str::slug($uuid) . '.' . $ext);
            }

            $this->slide->update([
                'paragraph_it' => $this->slide->paragraph_it,
                'paragraph_en' => $this->slide->paragraph_en,
                'btn_text_it' => $this->slide->btn_text_it,
                'btn_text_en' => $this->slide->btn_text_en,
                'btn_url' => $this->slide->btn_url,
                'small_centered_text_it' => $this->slide->small_centered_text_it,
                'small_centered_text_en' => $this->slide->small_centered_text_en,
                'big_centered_text' => $this->slide->big_centered_text,
                'coins_centered_text' => $this->slide->coins_centered_text,
                'background_url' => $this->background_url ? $bg_path : $this->slide->background_url,
            ]);

            $this->closeModal();
            $this->emit('slide-updated');
        }

        public function render()
        {
            return view('livewire.admin.pages.settings.widget.hero-slider.edit-slide');
        }
    }
