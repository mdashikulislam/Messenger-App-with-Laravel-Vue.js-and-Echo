<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    public function getContacts()
    {
        $contacts = User::where("id",'!=',auth()->id())->get();
        return response()->json($contacts);

    }
}
