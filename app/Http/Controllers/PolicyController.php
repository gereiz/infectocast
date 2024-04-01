<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index() {
        $policies = Policy::all();

        return view('privacy_policy.index', compact('policies'));
    }

    // Retorna a view de adicionar política
    public function addPolicy($id=null) {
        if($id && $id != null) {
            $policy = Policy::find($id);
            return view('privacy_policy.add_policy', compact('policy'));
        } else {
            return view('privacy_policy.add_policy');
        }
    }

    // Adiciona ou edita uma política
    public function addOrEditPolicy(Request $request) {
        // dd($request->all());
        $policy = Policy::find($request->id_policy);
        $request->validate([
            'title_policy' => 'required',
            'content_policy' => 'required',
            'active_policy' => 'required'
        ]);

        // Se a política for ativa, desativa todas as outras
        if($request->active_policy == 1) {
            $policies = Policy::all();
            foreach($policies as $policy) {
                $policy->is_active = 0;
                $policy->save();
            }
        }

        if($request->id_policy) {
            $policy = Policy::find($request->id_policy);
            $policy->title = $request->title_policy;
            $policy->content = $request->content_policy;
            $policy->is_active = $request->active_policy;
            $policy->id_user = auth()->user()->id;
            $policy->save();

            return redirect('privacyPolicy')->with('success', 'Política editada com sucesso!');
        } else {
            $policy = new Policy();
            $policy->title = $request->title_policy;
            $policy->content = $request->content_policy;
            $policy->is_active = $request->active_policy;
            $policy->id_user = auth()->user()->id;
            $policy->save();

            return redirect('privacyPolicy')->with('success', 'Política adicionada com sucesso!');
        }

        
    }

    // Deleta uma política
    public function deletePolicy(Request $request) {
        $policy = Policy::find($request->id_policy);
        $policy->delete();

        return redirect('privacyPolicy')->with('success', 'Política deletada com sucesso!');
    }
}
