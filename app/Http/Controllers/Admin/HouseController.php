<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HousesDataTable;
use App\Models\Front_house_image;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\House;
use App\Models\House_type;
use App\Models\Payment_method;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HouseController extends Controller
{
    public function index(HousesDataTable $house)
    {
        return $house->render('admin.houses.index', ['title' => 'admin title']);
    }

    public function create()
    {
        $owners = User::where('role_id', '=', 2)->get();
        $citys = City::all();
        $house_types = House_type::all();
        $payment_methods = Payment_method::all();
        return view('admin.houses.create-house', compact('owners', 'citys', 'house_types', 'payment_methods'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'owner_id' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            'city_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255', 'unique:houses'],
            'house_type_id' => ['required', 'integer'],
            'num_rooms' => ['required', 'integer'],
            'num_residents' => ['required', 'integer'],
            'num_bathrooms' => ['required', 'integer'],
            'num_flooers' => ['required', 'integer'],
            'num_parkings' => ['required', 'integer'],
            'total_size' => ['required', 'numeric'],
            'num_kitchens' => ['required', 'integer'],
            'annual_reset' => ['required', 'string'],
            'payment_method_id' => ['required', 'integer'],
            'image_ownership' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'image_lease' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'front_house_images' => ['required'],
            'front_house_images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],

        ]);

        $image_ownership = time() . 'image_ownership.' . request()->image_ownership->getClientOriginalExtension();
        request()->image_ownership->move(public_path('images\houses'), $image_ownership);
        $image_lease = time() . 'image_lease.' . request()->image_ownership->getClientOriginalExtension();
        request()->image_lease->move(public_path('images\houses'), $image_lease);
        $house = new House();
        $house->owner_id = $request->owner_id;
        $house->address = $request->address;
        $house->status = $request->status;
        $house->city_id = $request->city_id;
        $house->name = $request->name;
        $house->house_type_id = $request->house_type_id;
        $house->num_rooms = $request->num_rooms;
        $house->num_bathrooms = $request->num_bathrooms;
        $house->num_residents = $request->num_residents;
        $house->num_flooers = $request->num_flooers;
        $house->num_parkings = $request->num_parkings;
        $house->total_size = $request->total_size;
        $house->num_kitchens = $request->num_kitchens;
        $house->annual_reset = $request->annual_reset;
        $house->payment_method_id = $request->payment_method_id;
        $house->image_ownership = $image_ownership;
        $house->image_lease = $image_lease;
        $house->save();

        $count = 0;
        foreach ($request->front_house_images as $front) {
            $image_name = time() . $count . 'front_house_image.' . $front->getClientOriginalExtension();
            $front->move(public_path('images\houses'), $image_name);
            $count++;
            $Front_house_image = new Front_house_image();
            $Front_house_image->name = $image_name;
            $Front_house_image->house_id = $house->id;
            $Front_house_image->save();
        }

        $success = "Add New House Successfully";
        return back()->with('success', $success);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $owners = User::where('role_id', '=', 2)->get();
        $citys = City::all();
        $house_types = House_type::all();
        $payment_methods = Payment_method::all();
        $house = House::find($id);
        $front_images=$house->front_house_images;
        return view('admin.houses.edit-House', compact('owners', 'citys', 'house_types', 'payment_methods', 'house','front_images'));
    }
    public function update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'name'=>['required','string','unique:houses,name,'.$id],

        // ]);

        $validatedData = $request->validate([
            'owner_id' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            'city_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255', 'unique:houses,name,' . $id],
            'house_type_id' => ['required', 'integer'],
            'num_rooms' => ['required', 'integer'],
            'num_residents' => ['required', 'integer'],
            'num_bathrooms' => ['required', 'integer'],
            'num_flooers' => ['required', 'integer'],
            'num_parkings' => ['required', 'integer'],
            'total_size' => ['required', 'numeric'],
            'num_kitchens' => ['required', 'integer'],
            'annual_reset' => ['required', 'string'],
            'payment_method_id' => ['required', 'integer'],
            'image_ownership' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'image_lease' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'front_house_images' => ['nullable'],
            'front_house_images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        $house = House::find($id);
        $house->owner_id = $request->owner_id;
        $house->address = $request->address;
        $house->status = $request->status;
        $house->city_id = $request->city_id;
        $house->name = $request->name;
        $house->house_type_id = $request->house_type_id;
        $house->num_rooms = $request->num_rooms;
        $house->num_bathrooms = $request->num_bathrooms;
        $house->num_residents = $request->num_residents;
        $house->num_flooers = $request->num_flooers;
        $house->num_parkings = $request->num_parkings;
        $house->total_size = $request->total_size;
        $house->num_kitchens = $request->num_kitchens;
        $house->annual_reset = $request->annual_reset;
        $house->payment_method_id = $request->payment_method_id;

        if ($request->image_ownership) {
            $image_ownership = time() . 'image_ownership.' . request()->image_ownership->getClientOriginalExtension();
            request()->image_ownership->move(public_path('images\houses'), $image_ownership);
            $house->image_ownership = $image_ownership;
        }
        if($request->image_ownership){
            $image_lease = time() . 'image_lease.' . request()->image_ownership->getClientOriginalExtension();
            request()->image_lease->move(public_path('images\houses'), $image_lease);
            $house->image_lease = $image_lease;
        }
        

        $house->save();

        $count = 0;
        if ($request->front_house_images) {
            foreach ($request->front_house_images as $front) {
                $image_name = time() . $count . 'front_house_image.' . $front->getClientOriginalExtension();
                $front->move(public_path('images\houses'), $image_name);
                $count++;
                $Front_house_image = new Front_house_image();
                $Front_house_image->name = $image_name;
                $Front_house_image->house_id = $house->id;
                $Front_house_image->save();
            }
        }

        $success = "Add New House Successfully";
        // return back()->with('success', $success);

        return Redirect::back()->with('success', 'Updated House Successfully');

    }

    public function destroy($id)
    {
        $house = House::Find($id);
        $house->delete();
        return Redirect::back()->with('success', 'Deleted House Successfully');
    }

    public function delete_image_front(Request $request)
    {
        $Front_house_image = Front_house_image::Find($request->id);
        $Front_house_image->delete();
        return Redirect::back()->with('success', 'Deleted image Successfully');
    }
    

}
