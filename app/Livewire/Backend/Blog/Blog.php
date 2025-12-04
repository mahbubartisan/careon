<?php

namespace App\Livewire\Backend\Blog;

use App\Livewire\Forms\BlogForm;
use App\Models\Blog as ModelsBlog;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Blog')]

    public BlogForm $form;

    public function toggleStatus($id)
    {
        $blog = ModelsBlog::findOrFail($id);
        $blog->status = !$blog->status;
        $blog->save();

        $this->dispatch('toastr:success', 'Status updated!');
    }

    public function delete($id)
    {
        $blog = ModelsBlog::findOrFail($id);

        // Delete advisor image if exists
        if ($blog->image) {
            $this->deleteMedia($blog->image);
        }

        // Delete advisor record
        $blog->delete();

        $this->dispatch('toastr:success', 'Blog deleted!');
        return redirect()->back();
    }

    public function render()
    {
        $blogs = ModelsBlog::with('media')
            ->where('title', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.blog.blog', [
            'blogs' => $blogs,
        ])->extends('livewire.backend.layouts.app');
    }
}
