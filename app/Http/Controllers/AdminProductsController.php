<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{

    var $image_filePath = '/images/products/'; 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $img_filePath = '..'.$this->image_filePath;

        $products = Products::all();
        return view('admin.products.index', compact('products','img_filePath'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $imgFile_name = $input["model"];


        if($file = $request->file('photo')){
            $photo_fileName = str_replace(' ', '', $imgFile_name);
            mkdir(base_path().$this->image_filePath.$imgFile_name);
            $file->move(base_path().$this->image_filePath.$imgFile_name."/", $photo_fileName.".jpg");
        }

        Products::create($input);
        return redirect('/admin/products');
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
        $product = Products::findOrFail($id);
        $img_filePath = '..'.$this->image_filePath;
        return view('admin.products.edit', compact('product','img_filePath'));
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
        $product = Products::findOrFail($id);
        $input = $request->all();

        // $oldName_imgFile = str_replace(' ', '', $billboard->content.'.jpg');
        // $newName_imgFile = str_replace(' ', '', $input['content'].'.jpg');

        // rename(base_path()."/images/".$oldName_imgFile, base_path()."/images/advertising/homeBillboard/".$newName_imgFile);

        $product->update($input);

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $img_fileName = $product->model;

        //Deletes all files in the product folder.
        $files = glob(base_path().$this->image_filePath.$img_fileName.'/*');
        foreach($files as $file){
            if(is_file($file)){
                unlink($file);
            }
        }

        //Deletes product folder.
        rmdir(base_path().$this->image_filePath.$img_fileName);

        $product->delete();
        return redirect('admin/products');
    }
}
