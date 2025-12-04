<?php

namespace App\Livewire\Backend\Settings;

use App\Models\Media;
use App\Models\Settings as ModelSettings;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;

    #[Title('Site Settings')]

    public $search = '';
    public $rowsPerPage = 20;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $setting = ModelSettings::findOrFail($id);

        if ($setting->logo) {
            $logo = Media::find($setting->logo);

            if (File::exists($logo->path)) {
                File::delete($logo->path);
            }

            $logo->delete();
        }

        if ($setting->fav_icon) {
            $fav_icon = Media::find($setting->fav_icon);

            if (File::exists($fav_icon->path)) {
                File::delete($fav_icon->path);
            }

            $fav_icon->delete();
        }

        $setting->delete();
        session()->flash('success', 'Settings deleted successfully!');
        return redirect()->back();
    }

    public function render()
    {
        $settings = ModelSettings::with(['siteLogo', 'favIcon'])
        ->where('site_name', 'like', '%' . $this->search . '%')
            ->paginate($this->rowsPerPage);
        return view('livewire.backend.settings.settings', ['settings' => $settings])->extends('livewire.backend.layouts.app');
    }
}


