<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class profile_Controller extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show_profile()
    {   
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $userType = Auth::user()->role;
        $email = Auth::user()->email;
        $created_at = Auth::user()->created_at;
        $updated_at = Auth::user()->updated_at;
        // $allRoutes = DB::select("select * from `users`");
        // $user_info = profile::where('id', $author_id)->get();

        // $brandSpecifiedExpiredTicketDate = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','<',Carbon::now())->get();
        // $brandSpecifiedExpiredTicketSeat = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_seat','=',0)->get();
        
        
        // $allticket = [];
        // $userType = Auth::user()->role;
        // $numberofticket=0;
        // $totalrevenue=0;
        // foreach($allticket as $item)
        // {
        //     $numberofticket++;
        // }

        // foreach($allticket as $item)
        // {
        //     $totalrevenue+=$item->totalprice;
        // }
        
        if($userType=='Brand' || $userType == 'Admin'){
            return view('bus_profile',compact('id','name','email','updated_at','created_at','role'));
        }
        elseif($userType=='Customer'){
            return view('customer_profile',compact('id','name','email','updated_at','created_at','role'));
        }
        else{
             
            return Redirect::back();
        }
    }

    public function profile_update(Request $req)
    {
        // print_r($req->input());
        // dd($req -> all(),"doesit work?");
        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $data = new User;
        // $data->b_comp_ticket_author_id = $author_id;
        $data = User::where("name", $authod_name)->first();
        // dd($data,"doesit work?");
        $data -> name = $req-> name;
        // dd($req -> all(),"doesit work?");
        // $data -> id = Auth::user()->id+3;
        // $data -> email = Auth::user()->email;
        // $data -> password = Auth::user()->password;
       
        
        $data -> save();
        return redirect()->back();
    }
}