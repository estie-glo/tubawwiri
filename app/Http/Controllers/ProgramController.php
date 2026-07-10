<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_published', true)->get();

        return view('pages.programs.index', compact('programs'));
    }

    public function show(string $locale, string $program)
    {
        $program = Program::where('slug', $program)->firstOrFail();

        return view('pages.programs.show', compact('program'));
    }
}