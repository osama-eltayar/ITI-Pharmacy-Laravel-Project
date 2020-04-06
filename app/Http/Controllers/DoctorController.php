<?php

namespace App\Http\Controllers;

use App\User;
use App\Doctor;
use DataTables;
use App\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDoctorRequest;
// use Response;

class DoctorController extends Controller
{
    function index()
    {
        if(request()->ajax()){
            return $this->indexDataTable();
        }
        return view('doctors.index');
    }
    function indexDataTable()
    {
        if (request()->ajax()) {
            $doctors = Doctor::query();
            return DataTables()::of($doctors)
            ->addColumn('id', function(Doctor $doctor){
                return $doctor->id;
            })
            ->addColumn('name', function(Doctor $doctor){
                return $doctor->type->name;
            })
            ->addColumn('email', function(Doctor $doctor){
                return $doctor->type->email;
            })
            ->addColumn('pharmacy_id', function(Doctor $doctor){
                $pharmacy = $doctor->pharmacy->type->name;
                return $pharmacy;
            })
            ->addColumn('action', function(Doctor $doctor){
                $ban = (!$doctor->isBanned())? "btn-dark":"btn-secondary";
                
            })
            ->toJson();
        }
    }


    function show($doctorId)
    {
        $doctor = Doctor::find($doctorId);
        if($doctor->avatar)
            $doctor->avatar = Storage::url($doctor->avatar);
        return view('doctors.show', [
            "doctor" => $doctor,
        ]);
    }


    function destroy(Request $request)
    {
        $doctor = Doctor::find($request->doctor);
        User::find($doctor->type->id)->delete();
        $doctor->delete();
    }

    //  Creat Doctor View
    function create()
    {
        $pharmacies = Pharmacy::all();
        return view('doctors.create', [
            "pharmacies" => $pharmacies,
        ]);
    }


    //  Insert Doctor
    function store(StoreDoctorRequest $request)
    {
        $uploadedFile = $request->file('avatar');
        if($uploadedFile){
            $filename =  time().'_'.$uploadedFile->getClientOriginalName();
            $path = $request->file('avatar')->storeAs("public/avatars", $filename);
            $pathPeices = explode('/', $path);
            array_shift($pathPeices);
            $path = implode('/', $pathPeices);
        }

        $user =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        $user= $user->refresh();

        $doctor=Doctor::create([
            'national_id' => $request->national_id,
            'avatar' => $uploadedFile ? $path : "",
            'pharmacy_id' => $request->pharmacy_id,
            'is_baned' => $request->is_baned
        ]);
        $doctor = $doctor->refresh();

        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $pharmacy->doctors()->save($doctor);

        $doctor->type()->save($user);
        $user->assignRole('doctor');
        return redirect()->route('doctors.index');
    }

    //  Edit Doctor View
    function edit($doctorId)
    {
        $pharmacies = Pharmacy::all();
        return view('doctors.create', [
            "doctor" => Doctor::find($doctorId),
            "pharmacies" => $pharmacies,
        ]);
    }

    //  Update Doctor
    function update(Request $request)
    {
        if (request()->ajax()) {
            $doctor = Doctor::find($request->doctor);
            if ($doctor->isBanned()) {
                $doctor->unban();
            } else {
                $doctor->ban();
            }
            return response()->json([
                'is_baned' => $doctor->isBanned(),
            ]);
        }
        $uploadedFile = $request->file('avatar');
        if($uploadedFile){
            $filename =  time().'_'.$uploadedFile->getClientOriginalName();
            $path = $request->file('avatar')->storeAs("public/avatars", $filename);
            $pathPeices = explode('/', $path);
            array_shift($pathPeices);
            $path = implode('/', $pathPeices);
        }
        $doctor = Doctor::find($request->doctor);
        User::find($doctor->type->id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
            ]
        );
        Doctor::find($request->doctor)->update(
            [
                'national_id' => $request->national_id,
                'avatar' => $uploadedFile ? $path : "",
                'pharmacy_id' => $request->pharmacy_id,
                'is_baned' => $request->is_baned
            ]
        );
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $pharmacy->doctors()->save($doctor);
        return redirect()->route('doctors.index');
    }

}
