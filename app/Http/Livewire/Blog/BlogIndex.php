<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;
    public $search;

    protected $listeners = ['render'];

    public function delete($id)
    {
        $blog =  Blog::where('id', $id)->first();
        if ($blog) {
            $blog->delete();
        }
    }

    public function statusBlog($id)
    {
        $blog =  Blog::where('id', $id)->first();
        if ($blog) {
            $blog->status = !$blog->status;
            $blog->save();
        }
    }


    public function render()
    {

        $blogs = Blog::search($this->search)->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.blog.blog-index', compact('blogs'));
    }
}
