<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Feedback;
use Log;

class PageController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function about()
    {
        return view('user.about');
    }

    public function projects()
    {
        return view('user.projects');
    }

    public function journal()
    {
        return view('user.journal');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function form()
    {
        return view('user.form');
    }

    public function storeMember(Request $request)
    {
        Log::info('storeMember method called');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        Log::info('Validated Data:', $validatedData);

        Member::create($validatedData);

        Log::info('Member created successfully');

        return redirect()->back()->with('success', 'Data member berhasil disimpan!');
    }

    public function storeFeedback(Request $request)
    {
        Log::info('storeFeedback method called');

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        Log::info('Validated Data:', $validatedData);

        Feedback::create($validatedData);

        Log::info('Feedback created successfully');

        return redirect()->back()->with('success', 'Feedback berhasil disimpan!');
    }
}
