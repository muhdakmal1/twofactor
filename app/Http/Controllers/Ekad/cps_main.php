<?php

namespace App\Http\Controllers\Ekad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Models\model_cps_wishes;

class cps_main extends Controller
{
    public function view($user){
        $template_data = DB::table('cps_customer')
        ->leftjoin('cps_template', 'cps_template.customer_id','=','cps_customer.id')
        ->leftjoin('cps_music', 'cps_music.id', '=', 'cps_template.music_id')
        ->where('cps_customer.name',$user)
        ->first();

        $user_id = $template_data->customer_id;

        $wishes_data = DB::table('cps_customer')
        ->leftjoin('cps_wishes', 'cps_wishes.customer_id','=','cps_customer.id')
        ->leftjoin('cps_lookup', 'cps_lookup.lookup_id','=','cps_wishes.presence_recipient')
        ->where('name',$user)
        ->get();

        return view('ekad/index', compact('template_data','wishes_data', 'user_id'));
    }
    
    public function view2($user){
        $template_data = DB::table('cps_customer')
        ->leftjoin('cps_template', 'cps_template.customer_id','=','cps_customer.id')
        ->leftjoin('cps_music', 'cps_music.id', '=', 'cps_template.music_id')
        ->where('cps_customer.name',$user)
        ->first();

        $user_id = $template_data->customer_id;

        $wishes_data = DB::table('cps_customer')
        ->leftjoin('cps_wishes', 'cps_wishes.customer_id','=','cps_customer.id')
        ->leftjoin('cps_lookup', 'cps_lookup.lookup_id','=','cps_wishes.presence_recipient')
        ->where('name',$user)
        ->get();

        return view('ekad/index', compact('template_data','wishes_data', 'user_id'));
    }

    
}