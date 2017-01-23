<?php

namespace App\Http\Controllers;

use App\Advertising;
use Illuminate\Http\Request;
use App\Http\Requests\HomeBillboardCreateRequest;


class AdminHomeBillboardController extends Controller
{

    // rename(base_path()."/images/".$oldName_imgFile, base_path()."/images/".$newName_imgFile);

    // var $image_filePath = base_path();
    // .'/images/advertising/homeBillboard/'; 

    var $image_filePath = '/images/advertising/homeBillboard/'; 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billboards = Advertising::where('type','homeBillboard')->get();
        $img_filePath = $this->image_filePath;

        return view('admin.advertising.homeBillboard.index', compact('billboards','img_filePath'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.advertising.homebillboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeBillboardCreateRequest $request)
    {
        $name = $request->content;
        $input  = $request->all();

        if($file = $request->file('photo')){
            $photo_fileName = str_replace(' ', '', $name);
            $file->move(base_path().$this->image_filePath, $photo_fileName.".jpg");
        }

        $input['type'] = "homeBillboard";
        Advertising::create($input);

        return redirect('/admin/billboard');
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
        $billboard = Advertising::findOrFail($id);
        return view('admin.advertising.homeBillboard.edit', compact('billboard'));
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
        $billboard = Advertising::findOrFail($id);
        $input = $request->all();

        $oldName_imgFile = str_replace(' ', '', $billboard->content.'.jpg');
        $newName_imgFile = str_replace(' ', '', $input['content'].'.jpg');

        rename(base_path()."/images/".$oldName_imgFile, base_path()."/images/advertising/homeBillboard/".$newName_imgFile);

        $billboard->update($input);

        return redirect('/admin/billboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billboard = Advertising::findOrFail($id);
        $photo_fileName = str_replace(' ', '', $billboard->content).'.jpg';


        unlink(base_path()."/images/advertising/homeBillboard/".$photo_fileName);

        $billboard->delete();

        return redirect('/admin/billboard');
    }
}
