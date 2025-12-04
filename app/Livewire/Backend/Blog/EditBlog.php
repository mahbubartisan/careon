<?php

namespace App\Livewire\Backend\Blog;

use App\Livewire\Forms\BlogForm;
use App\Models\Blog;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBlog extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Advisor')]

    public BlogForm $form;

    public function mount($blogId)
    {
        $this->form->blogId = $blogId;

        $blog = Blog::findOrFail($this->form->blogId);

        $this->form->fill([
            'title' => $blog->title,
            'description' => $blog->description,
        ]);
    }

    public function update()
    {
        $this->validate();

        $blog = Blog::findOrFail($this->form->blogId);

        // Handle new image upload
        if ($this->form->image && !is_int($this->form->image)) {
            // Delete the old media if it exists
            if ($blog->image) {
                $this->deleteMedia($blog->image);
            }

            // Upload the new image
            $newPhoto = $this->uploadMedia(
                $this->form->image,
                'images/blog',
                80
            );

            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $blog->image; // keep the existing image
        }

        $blog->update([
            'image' => $newPhotoId,
            'title' => $this->form->title,
            'slug' => str()->slug($this->form->title),
            'description' => $this->form->description,
        ]);

        session()->flash('success', 'Blog updated!');
        return redirect()->route('blog');
    } 

    public function render()
    {
        return view('livewire.backend.blog.edit-blog')->extends('livewire.backend.layouts.app');
    }
}
