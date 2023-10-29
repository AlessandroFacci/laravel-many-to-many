<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    $title = "Projects";
    $projects = Project::orderByDesc('created_at')->paginate('12');

    return view('guest.home', compact('title', 'projects'));
  }
}