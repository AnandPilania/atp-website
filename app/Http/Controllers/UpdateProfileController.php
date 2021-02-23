<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Province;
use App\Person;
use Carbon\Carbon;
use App\Http\Controllers\Repositories\PersonnelRepository;
use Illuminate\Support\Facades\Cache;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $provinces = Cache::rememberForever('provinces', function () {
            return Province::get();
        });
        $civil_status = PersonnelRepository::CIVIL_STATUS;
        return view('user.update-profile', compact('user', 'provinces', 'civil_status'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'gender'            => 'required|in:' . implode(',', PersonnelRepository::GENDER),
            'temporary_address' => 'required',
            'address'           => 'required',
            'city'              => 'required|exists:cities,code',
            'barangay'          => 'required|exists:barangays,code',
            'province'          => 'required|exists:provinces,code',
            'status'            => 'required|in:' . implode(',', PersonnelRepository::CIVIL_STATUS),
            'image'             => 'required',
        ],['image.required' => 'Please attach some image.']);

        if($request->has('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/public/images', $imageName);
        }

        $person = Person::find(Auth::user()->person_id);

        $person->temporary_address = $request->temporary_address;
        $person->address           = $request->address;
        $person->image             = $imageName ?? $person->image;
        $person->gender            = $request->gender;
        $person->province_code     = $request->province;
        $person->city_code         = $request->city;
        $person->barangay_code     = $request->barangay;
        $person->civil_status      = $request->status;
        $person->email             = $request->email;
        $person->landline_number   = $request->landline_number;
        $person->save();
        
        return redirect()->route('home');
    }
}