<?php

namespace App\Livewire\Frontend\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogDetail extends Component
{
    public $blog;
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;

        $this->blog = Blog::where('slug', $slug)
            ->where('status', 1) // only published blogs
            ->firstOrFail();
    }
    
    public function render()
    {
        // Fetch related posts (same category if exists)
        $relatedPosts = Blog::where('status', 1)
            ->where('id', '!=', $this->blog->id)
            ->latest()
            ->take(4)
            ->get();
            
        return view('livewire.frontend.blog.blog-detail', [
            'relatedPosts' => $relatedPosts
        ])->extends('livewire.frontend.layouts.app');
    }
}
