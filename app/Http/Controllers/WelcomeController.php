<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Auth;
use Session;
use App\History;
use App\About;
use App\ConfessionOfFaith;
use App\Testimony;
use App\Minister;
use App\Media;
use App\Message;
use App\Announcement;
use App\BranchService;

class WelcomeController extends Controller
{
    public function index() {

        $history = History::where('status',true)->first();
        $about = About::where('status',true)->first();
        $confession = ConfessionOfFaith::where('status',true)->first();
        $testimonies = Testimony::all();
        $ministers = Minister::where('category', 'Minister')->where('status', true)->get();
        $medias = Media::all();
        $announcement = Announcement::where('status',true)->first();
        // $criterias = Criteria::with(['mode_of_entry', 'measures', ])->distinct()->get(['measure_type_id']);
        // $branch_services = BranchService::with(['branch',])->get()->groupBy('country_id');
        $branch_services = BranchService::with(['branch',])->get()->groupBy(function($branch_services){
            return $branch_services->branch->country;
        });

        return view('welcome.index', compact('history', 'about', 'confession', 'testimonies', 'ministers', 'medias', 'announcement', 'branch_services'));
    }

    
    public function storeMessage(Request $request) {

        $this->validate($request, [
            "fullname"  => "required",
            "phone_no"  => "required",
            "category"  => "required",
            "subject"  => "required",
            "message"  => "required",
        ]);

        $message = new Message;

        $message->fullname = $request->fullname;
        $message->phone_number = $request->phone_no;
        $message->message_type = $request->category;
        $message->subject = $request->subject;
        $message->message = $request->message;

        if($message->save() == true){
            Session::flash('success', 'Message Sent');
        }else{
            Session::flash('error', 'Could not Send Message');
        }
        return redirect(route('welcome'));
    }

    public function about_details() {

        $histories = History::all();
        $about = About::where('status',true)->first();
        $ministers = Minister::where('status', true)->get();
        return view('welcome.about_details', compact('histories', 'about', 'ministers'));
    }

}
