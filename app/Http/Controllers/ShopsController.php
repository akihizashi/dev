<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopsController extends Controller
{
  //back Controller
    public function indexAdmin()
    {
      $products = Shop::paginate(16);
      return view('/admin/shops/index', compact('products'));
    }

    public function create()
    {
      return view('/admin/shops/create');
    }

    public function store()
    {
      $this->validate(request(), [
          'name' => 'required|max:50',
          'code' => 'required|max:8',
          'description' => 'required|min:10',
          'release' => 'required',
          'image' => 'image|nullable|max:1999'
      ]);

      if(request()->hasFile('image')){
        $fileNameWithExt = request()->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = request()->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $path = request()->file('image')->storeAs('public/product_images', $fileNameToStore);
      } else {
        $fileNameToStore = 'NoImage.jpg';
      }

      Shop::create([
          'name' => request('name'),
          'code' => request('code'),
          'image' => $fileNameToStore,
          'category' => request('category'),
          'reposition' => request('reposition'),
          'price' => request('price'),
          'release' => request('release'),
          'description' => request('description')
      ]);

      return redirect('/admin/shops')->with('status', 'New product created');
    }

    public function edit($id)
    {
      $product = Shop::find($id);
      return view('admin/posts/edit', compact('product'));
    }

    public function delete()
    {
      Shop::where('id', '=', request('post_id'))->delete();
      return back()->with('status', 'Product deleted');
    }

  //front Controller

  public function index()
  {
    $products = Shop::paginate(16);
    return view('/shops/index', compact('products'));
  }

  public function show()
  {

  }
}
