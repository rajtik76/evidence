<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    public function index()
    {
        return view('evidence.index');
    }
}
