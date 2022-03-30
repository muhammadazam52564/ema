<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function index()
    {
        return "
        <div style='top: 50%;position: absolute; left: 50%; transform: translate(-50%, -50%);'>
            <h1 align='center'>403 Forbiden</h1>
            <h4 align='center'>Rider Not Allowed Here</h4>
        </div>
        ";
    }
}
