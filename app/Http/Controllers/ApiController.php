<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Traits\ApiResponser;
use App\Traits\S3ImageManager;

class ApiController extends Controller
{
    // use ApiResponser;
    use S3ImageManager;
}
