<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AdoptionRequestsController extends Controller
{
    public function index()
    {
        return view('admin.adoption-requests');
    }
}
