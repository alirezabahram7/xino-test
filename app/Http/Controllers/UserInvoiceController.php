<?php

namespace App\Http\Controllers;

class UserInvoiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $invoices = $user->invoices;

        return response()->json($invoices, 200);
    }

}
