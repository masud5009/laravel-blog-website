<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Category;
use File;
use Session;
class SettngController extends Controller
{
    public function edit(){
        $setting = Setting::find(1);
        if($setting){
            return view('admin.setting.edit',compact('setting'));
        }else{
            return view('admin.setting.edit');
        }
    }
    public function update(Request $request){
          $this->validate($request,[
            'name' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::where('id','1')->first();

        if($setting){
            $setting->name = $request->name;
            $setting->facebook = $request->facebook;
            $setting->twitter = $request->twitter;
            $setting->instagram = $request->instagram;
            $setting->email = $request->email;
            $setting->copyright = $request->copyright;
            $setting->address = $request->address;
            $setting->phone = $request->phone;
            $setting->contact_email = $request->contact_email;
            $setting->reddit = $request->reddit;
            $setting->description = $request->description;

            if($request->hasFile('logo')){
                //image exists
                $image_path = public_path('storage/setting/'.$setting->web_logo);
                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                $file = $request->file('logo');
                $filname = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/setting',$filname);
                $setting->web_logo = $filname;
            }
            $setting->save();
            Session::flash('success','Setting update successfully');
            return redirect()->back();

        }else{
            $setting = new Setting();

            $setting->name = $request->name;
            $setting->facebook = $request->facebook;
            $setting->twitter = $request->twitter;
            $setting->instagram = $request->instagram;
            $setting->email = $request->email;
            $setting->copyright = $request->copyright;
            $setting->reddit = $request->reddit;
            $setting->address = $request->address;
            $setting->phone = $request->phone;
            $setting->contact_email = $request->contact_email;
            $setting->description = $request->description;

            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filname = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/setting',$filname);
                $setting->web_logo = $filname;
            }
            $setting->save();
            Session::flash('success','Setting setup successfully');
            return redirect()->back();
        }
    }
}
