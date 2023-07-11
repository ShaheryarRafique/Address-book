<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    function retrieveAllContact()
    {
        $contacts = DB::table('contacts')
        ->orderBy('contact_id', 'ASC')
        ->paginate(5);

        return view('dashboard', ["contacts" => $contacts]);
    }

    function showContactForm()
    {
        return view("add-contact");
    }

    function addContact(Request $request)
    {
        $contact_data = $request->all();

        $name = $contact_data['name'];
        $email = $contact_data['email'];
        $contact = $contact_data['contact'];
        $role = $contact_data['role'];

        DB::table('contacts')->insert([
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'contact' => $contact,
        ]);

        // Clear the input fields
        $request->replace([]);

        return Redirect::to('/dashboard');
    }

    function deleteContact($id)
    {
        DB::table('contacts')->where('contact_id', $id)->delete();
        return Redirect::to('/dashboard');
    }


    function showUpdateContact($id)
    {
        $contact = DB::table('contacts')->where('contact_id', $id)->get();
        return view('update', ['contact' => $contact]);
    }

    function updateContact(Request $request, $id)
    {

        $contact = $request->all();

        DB::table('contacts')->where('contact_id', $id)->update(
            [
                'name' => $contact['name'],
                'email' => $contact['email'],
                'role' => $contact['role'],
                'contact' => $contact['contact'],
            ]
        );
        return Redirect::to('/dashboard');
    }
}
