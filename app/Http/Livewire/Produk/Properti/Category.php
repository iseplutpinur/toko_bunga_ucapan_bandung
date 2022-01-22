<?php

namespace App\Http\Livewire\Produk\Properti;

use App\Models\produk\properti\Category as ModelCategory;
use Illuminate\Http\Request;
use Livewire\Component;

class Category extends Component

{
    public $title;
    public $slug;
    public $description;
    public $post_id;
    public $is_edit = false;

    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'description' => 'required',
    ];

    public function index()
    {
        return view('category');
    }

    public function store()
    {
        $this->validate();
        if ($this->is_edit) {
            $warna = ModelCategory::find($this->post_id);
            $warna->title = $this->title;
            $warna->slug = $this->slug;
            $warna->description = $this->description;
            $warna->save();
            session()->flash('info', 'Warna Edited Successfully');
        } else {
            $post = ModelCategory::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description
            ]);
            session()->flash('info', 'Warna Created Successfully');
        }
        $this->reset();
    }

    public function edit($id)
    {
        $post = ModelCategory::find($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->description = $post->description;
        $this->is_edit = true;
    }

    public function cancelEdit()
    {
        $this->is_edit = false;
        $this->reset();
    }

    public function destroy($id)
    {
        ModelCategory::destroy($id);
        session()->flash('info',  'Warna Deleted Successfully');
        $this->reset();
    }

    public function render(Request $request)
    {
        $page = $request->input('page');
        $paginate = 5;
        $page = is_null($page) ? 0 : (($page - 1) * $paginate);

        return view('livewire.produk.properti.category', [
            'warnas' => ModelCategory::latest()->paginate($paginate),
            'start_number' => $page
        ]);
    }
}
