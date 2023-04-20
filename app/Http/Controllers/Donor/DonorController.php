<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Advertisement;
use App\Models\Blood;
use App\Models\City;
use App\Models\Donor;
use App\Models\Location;
use App\Models\RequestBlood;
use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class DonorController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Dashboard';
        $blood = Blood::count();
        $city = City::count();
        $locations = Location::count();
        $ads = Advertisement::count();
        $don['all'] = Donor::count();
        $don['pending'] = Donor::where('status', 0)->count();
        $don['approved'] = Donor::where('status', 1)->count();
        $don['banned'] = Donor::where('status', 0)->count();
        $donors = Donor::orderBy('id', 'DESC')->with('blood', 'location')->limit(8)->get();

        $pending_request_blood = RequestBlood::where('donor_id',Auth::guard('donor')->user()->id)->where('status',1)->count();

        return view('admin.donor_dashboard', compact('pageTitle', 'don', 'blood', 'city', 'locations', 'ads', 'donors','pending_request_blood'));
    }
    public function profile()
    {
        $pageTitle = 'Profile';
        $admin = Auth::guard('donor')->user();
        $cities = City::where('status', 1)->select('id', 'name')->with('location')->get();
        $bloods = Blood::where('status', 1)->select('id', 'name')->get();
        $location = Location::where('city_id',$admin->city_id)->first();
         
        return view('admin.donor-profile', compact('pageTitle', 'admin','bloods','cities','location'));
    }
    public function update(Request $request, $id)
    { 

        $request->validate([
            'name' => 'required|max:80',
            'email' => 'required|email|max:60|unique:donors,email,'.$id,
            'phone' => 'required|max:40|unique:donors,phone,'.$id,
            'city' => 'required|exists:cities,id',
            'location' => 'required|exists:locations,id',
            'blood' => 'required|exists:bloods,id',
            'gender' => 'required|in:1,2',
            'religion' => 'required|max:40',
            'profession' => 'required|max:80', 
            'address' => 'required|max:255',
            'details' => 'required',
            'birth_date' => 'required|date',
            'last_donate' =>'required|date',
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedinIn' => 'required',
            'instagram' => 'required',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $donor = Donor::findOrFail($id);
        $donor->name = $request->name;
        $donor->email = $request->email;
        $donor->phone = $request->phone;
        $donor->city_id = $request->city;
        $donor->blood_id = $request->blood;
        $donor->location_id = $request->location;
        $donor->gender = $request->gender;
        $donor->religion = $request->religion;
        $donor->profession = $request->profession;
        $donor->address = $request->address;
        $donor->details = $request->details;
        $donor->total_donate = $request->total_donate;
        $donor->birth_date =  $request->birth_date;
        $donor->last_donate = $request->last_donate;
        $socialMedia = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedinIn' => $request->linkedinIn,
            'instagram' => $request->instagram
        ];

        $donor->socialMedia = $socialMedia;
        $path = imagePath()['donor']['path'];
        $size = imagePath()['donor']['size'];

        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size, $donor->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $donor->image = $filename;
        }
        $donor->status = $request->status ? 1 : 2;
        $donor->save();
        $notify[] = ['success', 'Donor has been updated'];
        return back()->withNotify($notify);
    }


    public function donorRequest(){
        $pageTitle = 'Blood Request';
        $donor = Auth::guard('donor')->user();
        $blood_requests = RequestBlood::where('donor_id',$donor->id)->with('user')->get();
        return view('admin.donor.donor_blood_request',compact('pageTitle','donor','blood_requests'));
    }

    public function donorChangeStatus(Request $request){
     
        $user = RequestBlood::where('donor_id',Auth::guard('donor')->user()->id)->first();
        
        if($user){
            if($user->status == 2){
                return 2;
            }
            $user->status = $request->status;
            $user->update(); 
            return 1;
        }
        return false;
    }
}
