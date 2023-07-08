<?php

namespace App\Http\Livewire\Front;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;

 

    public function render()
    {

        $blogs = Blog::where('status', true)->paginate(10);
        return view('livewire.front.blog-list', compact('blogs'));
    }
}
