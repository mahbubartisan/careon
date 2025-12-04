<?php

namespace App\Livewire\Frontend\Blog;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;
    
    public function render()
    {
        $blogs = ModelsBlog::with('media')->where('status', 1)->latest()->paginate(12);
        return view('livewire.frontend.blog.blog', [
            'blogs' => $blogs,
        ])->extends('livewire.frontend.layouts.app');
    }
}
