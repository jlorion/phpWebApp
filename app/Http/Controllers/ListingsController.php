<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Listings;

class ListingsController extends Controller
{
    //show all and sort some stuff
    public function index(){
        return view('index', ['listings' => Listings::latest()->filter(request(['search']))->get()]);
    }
    public function store(Request $request){

        $formValidate =$request->validate([
            'title' => 'required',
            'price' => 'required',
            'location' => 'required',
            'contacts' => 'required',
            'longtitude' => 'required',
            'latitude' => 'required',
            'Description' => 'required',
            'images' => 'required'
        ]);

        $formValidate['images'] = json_encode($formValidate['images']);
        $formValidate["user_id"] =  auth()->id();

        Listings::create($formValidate);

        return redirect('/')->with('message', 'listing created succesfully');
    }

    public function create(){
        return view('listings.create');
    }

    public function edit(Listings $listing){
        return view('listings.edit', ['listing'=> $listing]);
    }
    public function update(Request $request, Listings $listing){
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formValidate = [
            'title'=>$request->title,
            'price'=>$request->price,
            'location'=>$request->location,
            'contacts'=>$request->contacts,
            'Description'=>$request->Description,
            'longtitude'=>$request->longtitude,
            'latitude'=>$request->latitude,
            'images'=>json_encode($request->images)
        ];
        $listing->update($formValidate);
        return redirect('/listings/'.$listing->id)->with('message', 'Listing Updated');
    }
    public function show(Listings $listing){
        return view('listings.show', ['listing'=> $listing]);
    }
    public function destroy(Listings $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted');
    }

}
