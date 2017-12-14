<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;

class KeywordController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $keywords = Keyword::all();
            return view('keyword.list')->with(['keywords' => $keywords]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $keyword = Keyword::findOrFail($n);
        return view('keyword.show')->with(['keyword' => $keyword]);
    }
}
