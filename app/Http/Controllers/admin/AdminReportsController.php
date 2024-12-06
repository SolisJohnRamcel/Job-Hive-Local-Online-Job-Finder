<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class AdminReportsController extends Controller
{
    public function admin_reports()
    {

        $contact = Contact::all();
        return view('admin.page.admin_reports', compact('contact'));
    }
    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Contact message deleted successfully.');
    }
}
