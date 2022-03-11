<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;



class AdminController extends Controller
{
    public function foodmenu()
    {
        return view("admin.foodmenu");
    }

    public function food()
    {
        $data = food::all();
        return view("admin.food",compact("data"));
    }

    public function deletemenu($id)
    {
        $data=food::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updateview($id)
    {
        $data=food::find($id);

        return view("admin.updateview",compact("data"));

    }

    public function upload(Request $request)
    {
        $data = new food;

        $image=$request->image;

        $imagename =time().'.'.$image->getClientOriginalExtension();
              $request->image->move('foodimage', $imagename);

              $data->image=$imagename;


              $data->title=$request->title;
              $data->price=$request->price;

              $data->description=$request->description;

              $data->save();
              return redirect()->back();
    }

    public function update(Request $request ,$id)
    {
        $data=food::find($id);

        $data->title=$request->title;
        $data->price=$request->price;

        $data->description=$request->description;

        $data->save();
        return redirect()->back();
    }
}
