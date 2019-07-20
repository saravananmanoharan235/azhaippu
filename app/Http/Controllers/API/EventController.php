<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Edujugon\PushNotification\PushNotification;
use Uuid;
use Image;

use App\Event;
use App\EventInfo;
use App\EventInvites;
use App\EventImage;

class EventController extends Controller
{
    public $successStatus = 200;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome']]);
    }


    public function getevents()
    {

        $getevents = Event::with(['user','eventimage','eventinfo','eventinvites'])->where('user_id',Auth::user()->id)->get();
        //echo "<pre>";print_r($getevents);die;

        if(!empty($getevents)){
            return response()->json(['success' => '1','event' => $getevents,'event_image_path' => url('uploads/events/')], $this->successStatus);
        }else{
            return response()->json(['success'=>'false'], $this->successStatus);            
        } 
    }

    public function addevent(Request $request)
    {
        $input = $request->all();
        $uuid = Uuid::generate(4);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'invite_message' => 'required',
            'date' => 'required',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {     
            $message = $validator->errors();
            return response()->json(['success' => false, 'messages' => 'The given data was invalid.', 'errors' => $validator->errors()], 422);      
        }



        $addEvents = Event::create(['uuid'=>$uuid,'user_id'=>Auth::user()->id,'name'=>$input['name'],'type'=>$input['type'],'invite_message'=>$input['invite_message']]);

        $input['date'] = dbsavedate($input['date']);
        $input['start_time'] = dbsavetime($input['start_time']);
        $input['end_time'] = dbsavetime($input['end_time']);

        $addEventInfo = EventInfo::create(['event_id'=>$addEvents->id,'date'=>$input['date'],'start_time'=>$input['start_time'],'end_time'=>$input['end_time'],'location'=>$input['location']]);

        $inputinvitecontacts = $input['invite_friends'];
        foreach ($inputinvitecontacts as $key => $invite) {
            EventInvites::updateOrCreate(['mobile_number' => $invite['mobile_number']], [ 
                'event_id' => $addEvents->id,
                'user_id' => Auth::user()->id,
                'user_name' => $invite['user_name'],
                'mobile_number' => $invite['mobile_number'],
                'email' => $invite['email']
            ]);
        }

        if(!empty($addEvents)){
            return response()->json(['success' => '1','event_id' => $addEvents->id], $this->successStatus);
        }else{
            return response()->json(['success'=>'false'], $this->successStatus);            
        } 
    }

     public function addeventphoto(Request $request)
    {
        $input = $request->all();
        //echo "<pre>";print_r($input);die;

        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'image' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {     
            $message = $validator->errors();
            return response()->json(['success' => false, 'messages' => 'The given data was invalid.', 'errors' => $validator->errors()], 422);      
        }

        $imageval = $request->file('image');
        foreach ($imageval as $key => $image) {

            $input['imagename'] = time().$key.'.'.$image->getClientOriginalExtension();
         
       
            $destinationPath = public_path('/uploads/events/small');
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/uploads/events/mid');
            $img = Image::make($image->getRealPath());
            $img->resize(250, 250, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);


            $destinationPath = public_path('/uploads/events/original');
            $image->move($destinationPath, $input['imagename']);


        $addEventImage = EventImage::create(['event_id'=>$input['event_id'],'image'=>$input['imagename']]);

        }


        
        return response()->json(['success' => '1','message' => 'Successfully Uploaded'], $this->successStatus);
    }

}
