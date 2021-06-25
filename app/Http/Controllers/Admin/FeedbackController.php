<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMail;

class FeedbackController extends Controller
{
    public function home()
    {
        $message = feedback::orderByDesc('created_at')->get();
        return view('admin.feedback.home', [
            'messages' => $message
        ]);
    }

    public function sendMail(Request $request)
    {
        $details = [
            'title' => 'Mail form NCT cosmetic',
            'message' => $request->message
        ];

        Mail::to($request->email)->send(new ReplyMail($details));

        if (Mail::failures()) {
            return view('client.contact');
        }
    }

    public function detail($id)
    {
        $message_content = feedback::find($id);
        return view('admin.feedback.detail', [
            'contents' => $message_content
        ]);
    }

    public function delete($id)
    {
        feedback::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
