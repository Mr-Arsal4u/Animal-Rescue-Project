<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MedicalServicesController extends Controller
{
    public function index()
    {
        return view('medical-services');
    }
}
