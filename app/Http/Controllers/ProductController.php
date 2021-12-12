<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductHasTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::with(['productHasTag'])->get();

        return view('select2.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('select2.create')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $product['name'] = $data['name'];
        $product['description'] = $data['description'];

        $product = Product::create($product);
        $productHasTag['products_id'] = $product->id;

        if ($request->has('tag')) {

            foreach ($data['tag'] as $tagItem) 
            {
                $checkTag = Tag::where('name', $tagItem)->first();

                if ($checkTag == null) 
                {
                    $newTag['name'] = $tagItem;
                    $tag = Tag::create($newTag);

                    $productHasTag['tags_id'] = $tag->id;
                    ProductHasTag::create($productHasTag);
                }
                else 
                {
                    $productHasTag['tags_id'] = $checkTag->id;
                    ProductHasTag::create($productHasTag);
                }
            }
        }

        return redirect()->route('product-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
