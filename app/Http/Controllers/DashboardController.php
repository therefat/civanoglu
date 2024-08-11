<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Location;
use App\Models\Media;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('dashboard');
    }
    public function properties(){
        $properties = Property::latest()->paginate(10);
        return view('admin.properties',['properties'=>$properties]);
    }
    public function addProperty()
    {
        $locations = Location::all();
        return view('admin.property.add',['locations' => $locations]);
    }
    public function validateProperty()
    {
        return [
            'name' => 'required',
            'name_tr' => 'required',
            'featured_image' => 'required',
            'location_id' => 'required',
            'price' => 'required|integer',
            'sale' => 'integer',
            'type' => 'integer',
            'bathrooms' => 'integer',
            'net_sqr' => 'integer',
            'pool' => 'integer',
            'overview' => 'required',
            'overview_tr' => 'required',
            'description' => 'required',
            'description_tr' => 'required',
        ];
    }
    public function createProperty(Request $request)
    {
        $request->validate($this->validateProperty());
        $property = new Property();
        $property->name = $request->name;
        $property->name_tr = $request->name_tr;
        $featured_image_name = time() . '-' . $request->featured_image->getClientOriginalName();
        //stor file
//        $request->featured_image->storeAs('public/uploads', $featured_image_name);
      //  dd($featured_image_name);
//        $request->image->move(public_path('uploads'), $featured_image_name);
        $request->featured_image->storeAs('images', $featured_image_name, 'public');
        $property->featured_image = $featured_image_name;
        $property->location_id = $request->location_id;
        $property->price = $request->price;
        $property->sale = $request->sale;
        $property->type = $request->type;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->net_sqr = $request->net_sqm;
        $property->gress_sqrt = $request->gross_sqm;
        $property->pool = $request->pool;
        $property->overview = $request->overview;
        $property->overview_tr = $request->overview_tr;
        $property->why_buy = $request->why_buy;
        $property->why_buy_tr = $request->why_buy_tr;
        $property->description = $request->description;
        $property->description_tr = $request->description_tr;

        $property->save();

        foreach($request->gallery_images as $image) {
            $gallery_image_name = time() . '-' . $image->getClientOriginalName();

            try {
                // Attempt to store the image
                $stored = $image->storeAs('public/uploads', $gallery_image_name);

                if ($stored) {
                    // Attempt to save the media record to the database
                    $media = new Media();
                    $media->name = $gallery_image_name;
                    $media->property_id = $property->id;

                    if ($media->save()) {
                        Log::info("Image and database record saved successfully: $gallery_image_name");
                    } else {
                        Log::error("Failed to save database record for image: $gallery_image_name");
                    }
                } else {
                    Log::error("Failed to store image: $gallery_image_name");
                }
            } catch (Exception $e) {
                Log::error("Error occurred: " . $e->getMessage());
            }
        }
        return redirect(route('dashboard-properties'))->with(['message' => 'Property is added.']);

    }
    public function deleteMedia($media_id) {
        $media = Media::findOrFail($media_id);
        // delete the file
        Storage::delete('public/uploads/' . $media->name);

        // remove row
        $media->delete();

        return back();
    }
    public function editProperty($property_id)
    {
        $property = Property::findOrFail($property_id);
        $locations = Location::all();
        return view('admin.property.edit',['property' => $property, 'locations' => $locations]);
    }
}
