<?php

namespace App\Http\Livewire;

use App\Models\Produk as ModelsProduk;
use App\Models\produk\properti\Category;
use App\Models\produk\properti\Color;
use Livewire\Component;
use Livewire\WithPagination;

class Produk extends Component
{
    use WithPagination;
    public $nama;
    public $slug;
    public $color_id;
    public $category_id;
    public $harga;
    public $kutipan;
    public $deskripsi;
    public $search;
    public $postId;
    public $isOpen = 0;
    public $isEdit = 0;

    protected $rules = [
        'nama' => 'required',
        'slug' => 'required',
        'color_id' => 'required',
        'category_id' => 'required',
        'harga' => 'required',
        'kutipan' => 'required',
        'deskripsi' => 'required',
    ];

    public function index()
    {
        return view('produk');
    }

    public function showModal()
    {
        $this->color_id = (in_array($this->color_id, [null, ''])) ? Color::first()->id : $this->color_id;
        $this->category_id = (in_array($this->category_id, [null, ''])) ? Category::first()->id : $this->category_id;
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate($this->rules);

        ModelsProduk::updateOrCreate(['id' => $this->postId], [
            'nama' => $this->nama,
            'slug' => $this->slug,
            'color_id' => $this->color_id,
            'category_id' => $this->category_id,
            'harga' => $this->harga,
            'kutipan' => $this->kutipan,
            'deskripsi' => $this->deskripsi,
        ]);

        $this->hideModal();

        session()->flash('info', $this->postId ? 'Produk Update Successfully' : 'Produk Created Successfully');
        $this->postId = '';
        $this->nama = '';
        $this->slug = '';
        $this->color_id = '';
        $this->category_id = '';
        $this->harga = '';
        $this->kutipan = '';
        $this->deskripsi = '';
        $this->color_id = Color::first();
        $this->category_id = Category::first();
        $this->reset();
    }

    public function edit($id)
    {
        $post = ModelsProduk::find($id);
        $this->postId = $post->id;
        $this->nama = $post->nama;
        $this->slug = $post->slug;
        $this->color_id = $post->color_id;
        $this->category_id = $post->category_id;
        $this->harga = $post->harga;
        $this->kutipan = $post->kutipan;
        $this->deskripsi = $post->deskripsi;
        $this->showModal();
    }

    public function destroy($id)
    {
        ModelsProduk::destroy($id);
    }

    public function render()
    {
        $colors = Color::all();
        $categories = Category::all();
        $searchParams = '%' . $this->search . '%';
        return view('livewire.produk', [
            'mahasiswas' => ModelsProduk::with(['color', 'category'])
                ->where('nama', 'like', $searchParams)->latest()->paginate(5),
            'colors' => $colors,
            'categories' => $categories,
        ]);
    }
}
