<?php

namespace App\Http\Controllers;

use App\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Uuid;
use Auth;



class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $title = 'Riders';
        return view('admin.riders.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Riders';
        return view('admin.riders.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:3|max:255',
            'password' => 'required|min:6'
        ]);
        $uuid = Uuid::generate(4);
        $riders = Rider::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone_no' => $input['mobileno'],
            'status' => 1, //1=Active,2='In-Active,3=Delete'
            'uuid'  => $uuid
        ]);

        return redirect('riders')->with('success', 'Rider Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {
        echo $riderId;die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit($riderUuid)
    {
        $title = 'Riders';
        $rider = Rider::where('uuid',$riderUuid)->first();
        //echo "<pre>";print_r($rider);die;
        return view('admin.riders.edit',compact('rider','riderUuid','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $riderUuid)
    {
        $input = $request->all();
        //echo "<pre>";print_r($input);die;

        $rider= Rider::where('uuid',$riderUuid)->first();
        $rider->email = $input['email'];       
        $rider->name = $input['name'];   
        $rider->phone_no = $input['mobileno'];   
        if(isset($input['password'])){
            $rider->phone_no = Hash::make($input['password']);             
        }
        $rider->save();
        return redirect('riders')->with('success', 'Riders has been successfully updated');
    }

    public function riderdelete($riderUuid)
    {
        //echo "<pre>";print_r($riderUuid);die;

        $rider= Rider::where('uuid',$riderUuid)->first();
        $rider->status = "2";
        $rider->save();
        return redirect('riders')->with('success', 'Riders has been successfully updated');
    }

    public function changestatus($riderUuid,$status)
    {
        //echo "<pre>";print_r($riderUuid);die;

        $rider= Rider::where('uuid',$riderUuid)->first();
        $rider->status = $status;
        $rider->save();
        return redirect('riders')->with('success', 'Riders has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider)
    {
        echo "destroy";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function usersajax()
    {
        $count = $this->getEmpDetails();
        $totalCount = count($count->get());


        $getData = $this->getEmpDetails();
        if(isset($_REQUEST['length']) && $_REQUEST['length'] != -1){
            $getData->offset($_REQUEST['start']);
            $getData->limit($_REQUEST['length']);

        }
        $data['riders'] = $getData->get();

        //echo "<pre>";print_r($data);die;
        $datas = array();
        $row = array();

        foreach ($data['riders'] as $user) {

            /*$fedituserurl = url('edituser/'.$prop->fuuid);
            $fromUser = '<a href="'.$fedituserurl.'" >'.ucfirst($prop->from).'</a>';

            $tedituserurl = url('edituser/'.$prop->tuuid);
            $toUser = '<a href="'.$tedituserurl.'" >'.ucfirst($prop->to).'</a>';*/

            //$edituserpropertyurl = url('edituserproperty/'.$prop->puuid);
            //$propertyy = '<a href="'.$edituserpropertyurl.'" >'.$prop->address1.'</a>';

            /*<div class="checkbox">
                            <label>
                                <input type="checkbox" name="optionsCheckboxes" checked>
                            </label>
                        </div>
                        <button type="button" rel="tooltip" class="btn btn-info">
                            <i class="material-icons">check_circle</i>
                        </button>*/
            //echo $user->status;die;
            if($user->status == '1'){
                $status = '<div style="display:none;">'.$user->status.'</div><i class="material-icons" style="color:#4CAF50;">check_circle</i>';
            }else if($user->status == '0'){
                $status = '<div style="display:none;">'.$user->status.'</div><i class="material-icons" style="color:#999999;">check_circle_outline</i>';
            }else{
                $status = '';
            }

            $action = '<a href="#" onclick="changeStatus(&#39;'.$user->uuid.'&#39;,&#39;1&#39;);return false;">
                        <i class="material-icons" style="color:#4CAF50;">check_circle</i>
                        </a>
                        <a href="#" onclick="changeStatus(&#39;'.$user->uuid.'&#39;,&#39;0&#39;);return false;">
                        <i class="material-icons" style="color:#999999;">check_circle_outline</i>
                        </a>
                        <a href='.url('riders/'.$user->uuid.'/edit').'><button type="button" rel="tooltip" class="btn btn-warning">
                            <i class="material-icons">edit</i>
                        </button></a>
                        <a href="#" onclick="deleteRider(&#39;'.$user->uuid.'&#39;);return false;"><button type="button" rel="tooltip" class="btn btn-danger">
                            <i class="material-icons">close</i>
                        </button></a>';

            $row = array("name"=>$user->name,"email"=>$user->email,"mobile"=>$user->phone_no,"status"=>$status,"action"=>$action);
            
            $datas[] = $row;
        }
            //echo "<pre>";print_r($datas);die;

        $output = array(
            "draw"=> $_POST['draw'],
            "recordsTotal" => $totalCount, //$this->companies->count_all(),
            "recordsFiltered" => $totalCount, //$this->companies->count_filtered(),
            "data" => $datas,
        );
        //output to json format
        echo json_encode($output);die;
    }

    public function getEmpDetails()
    {
        $usersdatas = DB::table('users')
                     ->select('users.name','users.email','users.phone_no','users.status','users.uuid');

        if(isset($_REQUEST['search']) && $_REQUEST['search']['value'] !=''){
            $searchValue = $_REQUEST['search']['value'];
            $usersdatas->orWhere(function ($query) use ($searchValue) {
                $query->orWhere("users.email","like","%".$searchValue."%")
                ->orWhere("users.name","like","%".$searchValue."%");
            });          
        }
        $usersdatas->where("users.id","!=",Auth::user()->id);
        $usersdatas->orderby("users.id","desc");
        return $usersdatas;
    }

}
