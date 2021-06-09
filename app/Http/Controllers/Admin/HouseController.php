<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HousesDataTable;
use App\Models\Front_house_image;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\House;
use App\Models\Flooer;
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
            'description' => ['required'],
            'about' => ['required'],
            'excellent_location' => ['required'],
            'safety_security' => ['required'],
            'professional_maintenance' => ['required'],
            'resident_account' => ['required'],
            'video'  => ['required','mimes:mp4,mov,ogg,qt'],
            'pdf'  => ['required','mimes:pdf'],

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
        $house->description = $request->description;
        $house->about = $request->about;
        $house->excellent_location = $request->excellent_location;
        $house->safety_security = $request->safety_security;
        $house->professional_maintenance = $request->professional_maintenance;
        $house->resident_account = $request->resident_account;

//        if(!empty($request->video)){
            $video_name = time() . 'video.' . request()->video->getClientOriginalExtension();
            request()->video->move(public_path('images\houses\videos'), $video_name);
            $house->video = $video_name;
//        }

//        if(!empty($request->pdf)){
            $pdf_name = time().'pdf.'. request()->pdf->getClientOriginalExtension();
            request()->pdf->move(public_path('images\houses\pdf'), $pdf_name);
            $house->pdf = $pdf_name;
//        }
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



        if(!empty($request->flooer_size)){

            foreach ($request->flooer_size as $key => $size) {
                $flooer=new Flooer();
                $flooer->size=$size;
                $flooer->bathroom=$request->flooer_bathroom[$key];
                $flooer->room=$request->flooer_room[$key];
                $flooer->describe=$request->flooer_describe[$key];
                $flooer->house_id= $house->id;

                $image_room=$request->flooer_image[$key];
                $image_name = time() . $key . 'room_image.' . $image_room->getClientOriginalExtension();
                $image_room->move(public_path('images\houses'), $image_name);
                $flooer->image= $image_name;
                $flooer->save();

            }
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
        $flooers=$house->flooers;
        $front_images=$house->front_house_images;
        return view('admin.houses.edit-House', compact('owners', 'citys', 'house_types', 'payment_methods', 'house','front_images','flooers'));
    }
    public function update(Request $request, $id)
    {

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
            'image_ownership' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'image_lease' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'front_house_images' => ['nullable'],
            'front_house_images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required'],
            'about' => ['required'],
            'excellent_location' => ['required'],
            'safety_security' => ['required'],
            'professional_maintenance' => ['required'],
            'resident_account' => ['required'],
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
        $house->description = $request->description;
        $house->about = $request->about;
        $house->excellent_location = $request->excellent_location;
        $house->safety_security = $request->safety_security;
        $house->professional_maintenance = $request->professional_maintenance;
        $house->resident_account = $request->resident_account;

        if (!empty($request->image_ownership)) {
            $image_ownership = time() . 'image_ownership.' . request()->image_ownership->getClientOriginalExtension();
            request()->image_ownership->move(public_path('images\houses'), $image_ownership);
            @unlink('images/houses/'.$house->image_ownership);
            $house->image_ownership = $image_ownership;
        }
        if($request->image_lease){
            $image_lease = time() . 'image_lease.' . request()->image_lease->getClientOriginalExtension();
            request()->image_lease->move(public_path('images\houses'), $image_lease);
            @unlink('images/houses/'.$house->image_lease);
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
        @unlink('images/houses/'.$Front_house_image->name);
        $Front_house_image->delete();

        return Redirect::back()->with('success', 'Deleted image Successfully');
    }
    public function edit_flooer(Request $request)
    {
       $flooer=Flooer::find($request->id);
       $flooer->size=$request->size;
       $flooer->bathroom=$request->bathroom;
       $flooer->room=$request->room;
       $flooer->describe=$request->describe;
       if($request->image){
           $new_image=$request->image;
            @unlink('images/houses/'.$flooer->image);
            $image_name = time().'flooer_image.' . $new_image->getClientOriginalExtension();
            $new_image->move(public_path('images\houses'), $image_name);
            $flooer->image=$image_name;
       }
       $flooer->save();
        return Redirect::back()->with('success', 'Save Flooer Successfully');
    }

    public function delete_flooer(Request $request)
    {
        $flooer = Flooer::Find($request->id);
        @unlink('images/houses/'.$flooer->image);
        $flooer->delete();

        return Redirect::back()->with('success', 'Deleted Flooer Successfully');
    }
    public function create_flooer(Request $request)
    {
        if(!empty($request->flooer_size)){

            foreach ($request->flooer_size as $key => $size) {
                $flooer=new Flooer();
                $flooer->size=$size;
                $flooer->bathroom=$request->flooer_bathroom[$key];
                $flooer->room=$request->flooer_room[$key];
                $flooer->describe=$request->flooer_describe[$key];
                $flooer->house_id= $request->house_id;

                $image_room=$request->flooer_image[$key];
                $image_name = time() . $key . 'room_image.' . $image_room->getClientOriginalExtension();
                $image_room->move(public_path('images\houses'), $image_name);
                $flooer->image= $image_name;
                $flooer->save();

            }
        }

        return Redirect::back()->with('success', 'Deleted Flooer Successfully');
    }




}
