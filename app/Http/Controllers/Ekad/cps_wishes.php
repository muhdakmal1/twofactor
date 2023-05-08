<?php

namespace App\Http\Controllers\Ekad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\model_cps_wishes;

class cps_wishes extends Controller
{
    public function insert_wishes(Request $request){
        model_cps_wishes::create([
            'customer_id' => $request->user_id,
            'name_recipient' => $request->name,
            'comment_recipient' => $request->comment,
            'presence_recipient' => $request->rsvpID,
        ]);

        return back()->with('message','Submitted');
    }

    public function recipient_wishes(Request $request, $user_id)
    {
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 =>'name_recipient',
            1 =>'comment_recipient',
            2 => 'presence_recipient',
            3 => 'lookup_desc',
        );

        $totalDataRecord = model_cps_wishes::where('customer_id', $user_id)->count();
        
        $totalFilteredRecord = $totalDataRecord;
        
        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');

        $post_data = DB::table('cps_wishes')
        ->leftjoin('cps_lookup', 'cps_lookup.lookup_id','=','cps_wishes.presence_recipient')
        ->where('cps_wishes.customer_id',$user_id);
        // ->offset($start_val)
        // ->limit($limit_val)
        // ->orderBy($order_val,$dir_val);
    
        $post_data = $post_data->get();
        
        $totalFilteredRecord = $post_data->count();
        
        $data_val = array();
        if(!empty($post_data))
        {
        foreach ($post_data as $post_val)
        {
        // $datashow =  route('posts_table.show',$post_val->emp_name);
        // $dataedit =  route('posts_table.edit',$post_val->emp_name);
        
        $postnestedData['name_recipient'] = $post_val->name_recipient;
        $postnestedData['comment_recipient'] = $post_val->comment_recipient;
        $postnestedData['presence_recipient'] = $post_val->presence_recipient;
        $postnestedData['lookup_desc'] = $post_val->lookup_desc;
        // $postnestedData['body'] = substr(strip_tags($post_val->body),0,50).".....";
        // $postnestedData['created_at'] = date('j M Y h:i a',strtotime($post_val->created_at));
        // $postnestedData['options'] = "&emsp;<a href='{$datashow}'class='showdata' title='SHOW DATA' ><span class='showdata glyphicon glyphicon-list'></span></a>&emsp;<a href='{$dataedit}' class='editdata' title='EDIT DATA' ><span class='editdata glyphicon glyphicon-edit'></span></a>";
        $data_val[] = $postnestedData;
        
        }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
        "draw"            => intval($draw_val),
        "recordsTotal"    => intval($totalDataRecord),
        "recordsFiltered" => intval($totalFilteredRecord),
        "data"            => $data_val
        );
        
        echo json_encode($get_json_data);
    
    }
}
