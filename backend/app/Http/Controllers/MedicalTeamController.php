<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MedicalTeamController extends Controller
{
    public function index()
    {
        return view('medical-team');
    }
}
