<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function home()
    {
        $message = feedback::orderByDesc('created_at')->get();
        return view('admin.feedback.home', [
            'messages' => $message
        ]);
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
