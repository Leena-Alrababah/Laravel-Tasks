<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    
    public function index()
    {
       $restaurants = Restaurant::all();
    //   dd($restaurants);

       return view('restaurants.home', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming data (optional)
        $validatedData = $request->validate([
            'name' => 'required',
            'discription' => 'required',
            'rating' => 'required',
            // Add validation rules for other fields
        ]);

        $filename = '';
        if ($request->hasFile('image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $filename);
        }

        // Create a new model instance and populate it with the validated data
        $newRest = new Restaurant;
        $newRest->name = $request->input('name');
        $newRest->discription = $request->input('discription');
        $newRest->rating = $request->input('rating');
        $newRest->image = $filename;
        // Assign values for other fields as needed

        // Save the data to the database
        $newRest->save();

        // Redirect to a success page or return a response as needed
        return redirect('/restaurants')->with(['success'=> 'Added Restaurant Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // return "Leena";

        $restaurants = Restaurant::where('id', $id)->first();
        return view('restaurants.edit', ['restaurants' => $restaurants]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //    return"leena";
        // $updateRest = Restaurant::where('id', $id);

        $updateRest['name']= $request->input('name');
        $updateRest['discription'] = $request->input('discription');
        $updateRest['rating'] = $request->input('rating');

        $filename = '';
        if ($request->hasFile('image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $filename);
            $updateRest['image'] = $filename;
        } else {
            unset($updateRest['image']);
        }

        Restaurant::where('id', $id)->update($updateRest);

        return redirect('/restaurants')->with(['success' => 'Updated Restaurant Successfully']);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurant::destroy($id);

        return redirect('/restaurants')->with(['success' => 'Deleted Restaurant Successfully']);

    }
}
