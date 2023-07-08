<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogCreate extends Component
{
    use WithFileUploads;


    public $description = '';
    public $isUploading = false;
    public $title;
    public $blog;
    public $url_img;
    public $status = false;

    public function mount()
    {
        $this->blog =  new Blog();
    }


    public function edit($id)
    {
        $this->blog =  Blog::where('id', $id)->first();
        if ($this->blog) {
            $this->title = $this->blog->title;
            $this->description = $this->blog->description;
            $this->status = $this->blog->status;
            $this->dispatchBrowserEvent('action-load-data-ckeditor');  //Cargamos la data al editor
        } else {
            $this->blog =  new Blog();
        }
    }

    public function create()
    {
        $this->blog =  new Blog();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'url_img' => 'required',
        ]);



        if ($this->url_img) {
            $img =  $this->url_img->store('blogs', 'public');  // metodo el cual le dimos la ruta donde se va guardar
            if ($this->blog->url_img) {
                Storage::disk('public')->delete($this->blog->url_img); // eliminamos la anterior imagen en caso de actualizar un archivo con imagenes
            }
            $this->blog->url_img = $img;
        }
        $this->blog->title =  $this->title;
        $this->blog->description =  $this->description;
        $this->blog->status =  $this->status;
        $this->blog->save();

        $this->isUploading = false;
        $this->blog =  new Blog();

        $this->reset('title', 'description', 'url_img'); //Se resetean los valores
        $this->emit('showOfModal', 'hs-large-modal'); //emitimos un evento en el navegador para cerrar el modal
        $this->emitTo('blog.blog-index', 'render'); //Se emite un evento el cual ejecutara la funcion render del otro componente
    }

    public function render()
    {
        return view('livewire.blog.blog-create');
    }
}
