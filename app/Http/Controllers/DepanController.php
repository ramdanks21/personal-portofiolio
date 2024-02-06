<?php

namespace App\Http\Controllers;

use App\Models\Halaman;

class DepanController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_about');
        $about_data = Halaman::where('id', $about_id)->first();

        // $interest_id = get_meta_value('_intereset');
        // $interest_data = Halaman::where('id', $interest_id)->first();

        // $award_id = get_meta_value('_award');
        // $award_data = Halaman::where('id', $award_id)->first();

        return view('depan.index')->with(
            'about', $about_data,
            // 'award', $award_data,
        );
    }
}
