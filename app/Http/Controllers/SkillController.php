<?php

namespace App\Http\Controllers;

use App\Models\metada;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SkillController extends Controller
{
    public function index()
    {

        $skil_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skil_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("', '", $skill) . "'";
        return view('dashboard.skill.index')->with('skill', $skill);

    }

    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                '_language' => 'required',
                '__workflow' => 'required',
            ], [
                '_language.required' => 'Masukan bahasa pemprograman yang kamu kuasai',
                '__workflow.required' => 'Masukan Workflow yang kamu kuasai',
            ]);
            metada::updateOrCreate([
                'meta_key' => '_language',
                'meta_value' => $request->_language,
            ]);
            metada::updateOrCreate([
                'meta_key' => '__workflow',
                'meta_value' => $request->__workflow,
            ]);
            return redirect()->route('skill.index')->with('success', 'berhasil malakukan update data');
        }

    }
}
