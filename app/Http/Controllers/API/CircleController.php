<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Uuid;
use Image;

use App\Circle;
use App\CircleFriends;

class CircleController extends Controller
{
    public $successStatus = 200;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function getcircles()
    {

        $getcircles = Circle::with(['user','circlefriends'])->where('user_id',Auth::user()->id)->get();
        //echo "<pre>";print_r($getcircles);die;

        if(!empty($getcircles)){
            return response()->json(['success' => '1','circle' => $getcircles,'circle_image_path' => url('uploads/circle/')], $this->successStatus);
        }else{
            return response()->json(['success'=>'false'], $this->successStatus);            
        } 
    }

    public function addcircle(Request $request)
    {
        $input = $request->all();
        //echo "<pre>";print_r($input);die;
        $uuid = Uuid::generate(4);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {     
            $message = $validator->errors();
            return response()->json(['success' => false, 'messages' => 'The given data was invalid.', 'errors' => $validator->errors()], 422);      
        }

        $addCircles = Circle::create(['uuid'=>$uuid,'user_id'=>Auth::user()->id,'name'=>$input['name'],'friend'=>$input['name']]);

        $inputinvitecontacts = $input['add_friend'];
        foreach ($inputinvitecontacts as $key => $invite) {
            CircleFriends::Create([ 
                'circle_id' => $addCircles->id,
                'user_id' => Auth::user()->id,
                'user_name' => $invite['user_name'],
                'mobile_number' => $invite['mobile_number'],
                'email' => $invite['email'],
                'friend' => $invite['friend']
            ]);
        }

        


        if(!empty($addCircles)){
            return response()->json(['success' => '1','circle_id' => $addCircles->id], $this->successStatus);
        }else{
            return response()->json(['success'=>'false'], $this->successStatus);            
        } 
    }

    public function addcirclephoto(Request $request)
    {
        $input = $request->all();
        //echo "<pre>";print_r($input);die;

        $validator = Validator::make($request->all(), [
            'circle_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {     
            $message = $validator->errors();
            return response()->json(['success' => false, 'messages' => 'The given data was invalid.', 'errors' => $validator->errors()], 422);      
        }

        $image = $input['image'];
        $input['imagename'] = time().rand().'.'.$image->getClientOriginalExtension();
         
       
        $destinationPath = public_path('/uploads/circle/small');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/uploads/circle/mid');
        $img = Image::make($image->getRealPath());
        $img->resize(250, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('/uploads/circle/original');
        $image->move($destinationPath, $input['imagename']);

        $addCircleImage = Circle::where('id',$input['circle_id'])->update(['image'=>$input['imagename']]);



        
        return response()->json(['success' => '1','message' => 'Successfully Uploaded'], $this->successStatus);
    }


}
