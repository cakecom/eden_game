<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Routing\ControllerMiddlewareOptions
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        //
        $data =Item::all();
        return view('admin.item.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $item = new Item();
        $file = $request->file('file');
        $path = 'images/uploads/item';
        $filename = $file->getClientOriginalName();
        $file->move($path, $filename);
        $data=[
            'image'=>$filename,
            'name' => $request->name,
            'code' => $request->code,
//            'rate' => $request->rate,
            'number' => $request->count,
            'priority' =>$request->priority,
            'boxes_id'=>$request->id
        ];
        $item->create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Item::with('rate_r')->where('boxes_id',$id)->get();
        $boxes_id=$id;
        return  view('admin.item.show',compact('data','boxes_id'));
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

        $item = Item::findOrFail($request->id);
        $file = $request->file('file');
        $path = 'images/uploads/item';
        if($file){

            $filename = $file->getClientOriginalName();
            if (File::exists($path.'/'.$request->old_image)){
                File::delete($path . '/' . $request->old_image);
            }
            $file->move($path, $filename);
            $item->update([
                'image'=>$filename,
                'name' => $request->name,
                'code' => $request->code,
//                'rate' => $request->rate,
                'number' => $request->count,
                'priority' =>$request->priority,

            ]);
        }

        $item->update([
            'name' => $request->name,
            'code' => $request->code,
//            'rate' => $request->rate,
            'number' => $request->count,
            'priority' =>$request->priority,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Item::find($id);
        $data->delete();
        return redirect()->back();
    }
}
