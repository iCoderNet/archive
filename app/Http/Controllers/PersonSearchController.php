<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonSearchController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $query = Person::query();

        if ($request->filled('firstname')) {
            $query->where('firstname', 'like', '%' . $request->get('firstname') . '%');
        }

        if ($request->filled('lastname')) {
            $query->where('lastname', 'like', '%' . $request->get('lastname') . '%');
        }

        if ($request->filled('birth_year')) {
            $query->where('birth_year', $request->input('birth_year'));
        }
        
        $persons = $query->paginate($perPage);

        return view('pages.person', compact('persons'));
    }
}
