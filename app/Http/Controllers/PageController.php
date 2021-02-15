<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Channel;
Use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function login(Request $request){

    }

    public function dashboard(){
        if (Auth::check()) {
        return view('/admin/dashboard');
        }
        else{
            return redirect('/login');
        }
    }

    public function videoplayer(){
        $company_main=Company::all();
        $channel_main=Channel::all();
        return view('videoplayer',compact('company_main','channel_main'));
    }
    public function channels(){
        if (Auth::check()) {
        $channels=Channel::all();
        return view('admin/channels',compact('channels'));
        }
        else{
            return redirect('/login');
        }
    }
    public function company(){
        if (Auth::check()) {
        $companies=Company::all();
        return view('admin/company',compact('companies'));
        }
        else{
            return redirect('/login');
        }
    }
    public function addchannelview(){
        if (Auth::check()) {
        return view('admin/addchannel');
        }
        else{
            return redirect('/login');
        }
    }
    public function addcompanyview(){
        if (Auth::check()) {
        return view('admin/addcompany');
        }
        else{
            return redirect('/login');
        }
    }


    public function addchannel(Request $request){
    //   $request->validate([
    //         'chanelname' => 'required|unique:posts|max:255',
    //         'chanelurl' => 'required',
    //         // 'logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

        $newchanel=new Channel;
        $newchanel->name=$request->chanelname;
        $newchanel->url=$request->chanelurl;
        $image=time().'.'.$request->logo->getClientOriginalExtension();
        $movetofolder=$request->logo->move(public_path('images'),$image);
        $newchanel->logo=$image;
        $newchanel->save();

        return redirect('/admin/channels');
    }
    public function addcompany(Request $request){
        //   $request->validate([
        //         'chanelname' => 'required|unique:posts|max:255',
        //         'chanelurl' => 'required',
        //         // 'logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
    
            $newcompany=new Company;
            $newcompany->cname=$request->companyname;
            $cimage=time().'.'.$request->clogo->getClientOriginalExtension();
            $movetofolder=$request->clogo->move(public_path('images'),$cimage);
            $newcompany->clogo=$cimage;
            $newcompany->save();
    
            return redirect('/admin/company');
        }

    public function getvideourl(Request $request){
        $video=Channel::find($request->id);
        $url=$video->url;

        return response()->json(array('url'=>$url));
    }

    public function editchannel($id){
        $edit_chanel=Channel::find($id);
        return view('admin/editchannel',compact('edit_chanel'));
    }

    public function updatechannel(Request $request,$id){
        $updatech=Channel::find($id);
        if($request->logo){
        $updatech->name=$request->chanelname;
        $updatech->url=$request->chanelurl;
        $image=time().'.'.$request->logo->getClientOriginalExtension();
        $movetofolder=$request->logo->move(public_path('images'),$image);
        $updatech->logo=$image;
        $updatech->save();
        }
        else{
            $updatech->name=$request->chanelname;
            $updatech->url=$request->chanelurl;
            $updatech->save();
        }
        return redirect('/admin/channels');
    }

    public function deletechannel($id){
        $delch=Channel::find($id);
        $delch->delete();
        return redirect('/admin/channels');
    }

    public function editcompany($id){
        $edit_company=Company::find($id);
        return view('admin/editcompany',compact('edit_company'));
    }

    public function updatecompany(Request $request,$id){
        $updatecom=Company::find($id);
        if($request->clogo){
        $updatecom->cname=$request->companyname;
        $image=time().'.'.$request->clogo->getClientOriginalExtension();
        $movetofolder=$request->clogo->move(public_path('images'),$image);
        $updatecom->clogo=$image;
        $updatecom->save();
        }
        else{
            $updatecom->cname=$request->companyname;
            $updatecom->save();
        }
        return redirect('/admin/company');
    }

    public function deletecompany($id){
        $delcom=Company::find($id);
        $delcom->delete();
        return redirect('/admin/company');
    }
}
