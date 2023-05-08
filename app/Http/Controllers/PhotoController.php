<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function view()
    {
        $photoList = Photo::all();
        return view('/photos', ['photoList' => $photoList]);
    }

    public function store()
    {
        return view('/photo-add');
    }

    public function create(Request $request)
    {
        $photoName = '';
        
        if($request->file('img')){
            $extension = $request->file('img')->getClientOriginalExtension();
            $photoName = $request->photo_name.'.'.$extension;
            $request->file('img')->storeAs('public/photo', $photoName);
        }

        $request['photo'] = $photoName;   
   
        $validated = $request->validate([
            'photo_name' => 'required|unique:photos|min:5|max:255',
            'owner' => 'required|min:5|max:255',
            'photo' => 'required|min:5|max:255',
        ]);

        $photo = Photo::create($request->all());
        
        if($photo){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully add new photo!');
        }

        return redirect('photos');
    }

    public function delete($id)
    {
        $photo = Photo::findOrFail($id);
        return view('photo-delete', ['photo' => $photo]);
    }

    public function destroy($id)
    {
        $deletedPhoto = Photo::findOrFail($id);

        Storage::delete($deletedPhoto->photo);

        $deletedPhoto->delete();

        if($deletedPhoto){
            Session::flash('status', 'success');
            Session::flash('message', 'Photo successfully deleted!');
        }

        return redirect('photos');
    }
}
