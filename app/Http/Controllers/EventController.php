<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Uuid;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $title = 'Event';
        return view('admin.events.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Event';
        return view('admin.events.add', compact('title'));
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
            'email' => 'required|email|unique:events,email',
            'fname' => 'required|min:3|max:255',
            'password' => 'required|min:6'
        ]);
        $uuid = Uuid::generate(4);
        $events = Event::create([
            'fname' => $input['fname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone_no' => $input['mobileno'],
            'status' => 1, //1=Active,2='In-Active,3=Delete'
            'uuid'  => $uuid
        ]);

        return redirect('admin/events')->with('success', 'Event Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        echo $eventId;die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($eventUuid)
    {
        $title = 'Event';
        $event = Event::where('uuid',$eventUuid)->first();
        //echo "<pre>";print_r($event);die;
        return view('admin.events.edit',compact('event','eventUuid','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $eventUuid)
    {
        $input = $request->all();
        //echo "<pre>";print_r($input);die;

        $event= Event::where('uuid',$eventUuid)->first();
        $event->email = $input['email'];       
        $event->fname = $input['fname'];   
        $event->phone_no = $input['mobileno'];   
        if(isset($input['password'])){
            $event->phone_no = Hash::make($input['password']);             
        }
        $event->save();
        return redirect('admin/events')->with('success', 'Event has been successfully updated');
    }

    public function eventdelete($eventUuid)
    {
        //echo "<pre>";print_r($eventUuid);die;

        $event= Event::where('uuid',$eventUuid)->first();
        $event->status = "2";
        $event->save();
        return redirect('admin/events')->with('success', 'Event has been successfully updated');
    }

    public function changestatus($eventUuid,$status)
    {
        //echo "<pre>";print_r($eventUuid);die;

        $event= Event::where('uuid',$eventUuid)->first();
        $event->status = $status;
        $event->save();
        return redirect('admin/events')->with('success', 'Event has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        echo "destroy";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function ajaxlist()
    {
        $count = $this->getEventDetails();
        $totalCount = count($count->get());


        $getData = $this->getEventDetails();
        if(isset($_REQUEST['length']) && $_REQUEST['length'] != -1){
            $getData->offset($_REQUEST['start']);
            $getData->limit($_REQUEST['length']);

        }
        $data['events'] = $getData->get();

        //echo "<pre>";print_r($data);die;
        $datas = array();
        $row = array();

        foreach ($data['events'] as $user) {

            
            $action = '<a href='.url('admin/events/'.$user->uuid.'/edit').'><button type="button" rel="tooltip" class="btn btn-warning">
                            <i class="material-icons">edit</i>
                        </button></a>
                        <a href="#" onclick="deleteEvent(&#39;'.$user->uuid.'&#39;);return false;"><button type="button" rel="tooltip" class="btn btn-danger">
                            <i class="material-icons">close</i>
                        </button></a>';

            $row = array("name"=>$user->name,"type"=>$user->type,"invite_message"=>$user->invite_message,"user_name"=>$user->user_id,"action"=>$action);
            
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

    public function getEventDetails()
    {
        $eventsdatas = DB::table('events')
                     ->select('*');

        if(isset($_REQUEST['search']) && $_REQUEST['search']['value'] !=''){
            $searchValue = $_REQUEST['search']['value'];
            $eventsdatas->orWhere(function ($query) use ($searchValue) {
                $query->orWhere("events.name","like","%".$searchValue."%")
                ->orWhere("events.type","like","%".$searchValue."%");
            });          
        }
        //$eventsdatas->where("events.id","!=",Auth::user()->id);
        //$usersdatas->where("users.status","!=",'1');
        //$eventsdatas->orderby("events.id","desc");
        return $eventsdatas;
    }

}
