<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food_type;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;


class FoodtypeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
             $foodtypes =  Food_type::paginate(15);
             return view('foodtypes.index',['foodtypes'=>$foodtypes]);
        } else {
            return redirect()->route('orders.index')->withStatus(__('No Access'));
        }       
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $foodtype = new Food_type;
        $foodtype->title = strip_tags($request->title);
        $foodtype->image = '';
        if (!empty($request->file('category_images'))) {
            $imgname = time().'.'.$request->file('category_images')->extension();
            $imgPath = $request->file('category_images')->storeAs('category_images', $imgname,'public');
            $foodtype->image = $imgPath;
        }
        $foodtype->save();
        return redirect('/foodtypes');
    }
    public function show($id)
    {
       
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {
        $foodtype = Food_type::find($request->id);
        $foodtype->title = strip_tags($request->title);
        if (!empty($request->file('category_images'))) {
            $imgname = time().'.'.$request->file('category_images')->extension();
            $imgPath = $request->file('category_images')->storeAs('category_images', $imgname,'public');
            $foodtype->image = $imgPath;
        }
        $foodtype->update();
        return redirect('/foodtypes');
    }
    public function destroy($id)
    {
         Food_type::where('id',$id)->delete();
         return redirect('/foodtypes')->withStatus(__('Category successfully deleted.'));
    }

    public function changestatus($id,$status)
    {
        $foodtype = Food_type::find($id);
        $foodtype->status = $status;
        $foodtype->update();
        return redirect('/foodtypes');
    }

}
