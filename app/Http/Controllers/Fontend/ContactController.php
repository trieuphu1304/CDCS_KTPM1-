<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        
    }

    public function index() {
        $template = 'fontend.contact.index';

        return view('fontend.layout', compact(
            'template'
        ));
    }
    public function store(Request $request)
    {
        // Validate dữ liệu từ người dùng
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'required|string',
        ]);

        // Lưu thông tin vào cơ sở dữ liệu
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);
        session(['success' => 'Thông tin của bạn đã được gửi thành công.']);
        return redirect()->route('contact.form');
    }
}