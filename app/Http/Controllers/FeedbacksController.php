<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    //
    public function index() : View {
        return view('feedbacks.index',[
            'feedbacks' => Feedback::latest()->paginate(10)
        ]);
    }

    public function create() : View {
        return view('feedbacks.create');
    }

    public function store(Request $request) {
        try{
            $feedback = new Feedback();
            $feedback->title = $request->title; 
            $feedback->description = $request->description; 
            $feedback->user_id = auth()->user()->id; 
            $feedback->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e);
        }

        return redirect()->back()->with('message', 'successfully submitted');
    }
}
