<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DoctorsController extends Controller
{
    public function index()
    {
        // You can pass doctors data here if needed
        return view('doctors');
    }
}
