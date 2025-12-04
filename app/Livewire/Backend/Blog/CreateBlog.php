<?php

namespace App\Livewire\Backend\Blog;

use App\Livewire\Forms\BlogForm;
use App\Models\Blog;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlog extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Blog')]

    public BlogForm $form;

    public function store()
    {
        // Validate the form
        $this->validate();

        // Handle image upload if present
        if ($this->form->image) {
            $image = $this->uploadMedia($this->form->image, 'images/blog', 80);
            $imagePath = $image->id;
        }

        // Save the About data
        Blog::create([
            'image' => $imagePath,
            'title' => $this->form->title,
            'slug' => str()->slug($this->form->title),
            'description' => $this->form->description,
        ]);

        // Optional: flash success message
        session()->flash('success', 'Blog created!');
        return redirect()->route('blog');
    }

    public function render()
    {
        return view('livewire.backend.blog.create-blog')->extends('livewire.backend.layouts.app');
    }
}
