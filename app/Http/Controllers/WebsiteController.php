<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidation;
use App\Http\Requests\WebValidation;
use App\Posts;
use App\User;
use App\Websites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function websites()
    {
        $website=Websites::all();
        return $website;
    }
    public function show($id)
    {
        $website=Websites::find($id);
        return $website;
    }
    public function create(WebValidation $request)
    {
        DB::table('websites')->insert(
            array(
                'name' => $request['name'],
                'description' => $request['description']
            )
        );
        return 'Website Created Successfully';
    }
    public function createPost(PostValidation $request, $id){
        $website = Websites::find($id);

        $post= Posts::create([
            'title' => $request['title'],
            'description'=>$request['description'],
            'web_id'=>$id
        ]);

        $abc=array();
        $i=0;
        $users=$website->users;
        foreach($users as $user)
        {
            $email=$user['email'];
            $abc[$i]=array($email);
            $i++;
        }
        for($j=0;$j<sizeof($abc);$j++){
            $to_email=$abc[$j];
            $data=array('name'=>$post['title'],'body'=>$post['description']);
            Mail::send('mail',$data,function($message)use($to_email){
               $message->to($to_email)
               ->subject('Post Notification');
            });
        }
            return "Email Sent Successfully......";

    }

    public function update(Request $request,$id){
        $website = Websites::find($id);

        $website->name = $request->input('name');
        $website->description= $request->input('description');
        $website->save();
        return $website;
    }
    public function delete($id)
    {
        $website = Websites::find($id);
        $website->delete();
        return 'Deleted Successfully';
    }
    public function deleteall()
    {
        $website=Websites::all();
        $website->delete();
        return 'All websites Deleted Successfully';
    }
    public function subscribe(Request $request,$id){
        $user = User::find($request['user_id']);
        $website=Websites::find($id);
       // dd($user);
        $website->users()->attach($user);
        return "Web successfully subscribed";


    }
}
