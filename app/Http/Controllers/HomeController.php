<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Http\Request;
use App\Models\establishment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::guard('admin')->check()){
        return view('dash.index');
        }else{
            return redirect('/quiz');
        }
    }

    public function GroupByEtablishment(){
        $groupsByEtabliss = establishment::with('groups')->get();
        //  Group by mnths of year
        $QuizRes = DB::select(" SELECT count(id) as 'passedquizes',monthname(created_at)as 'month' FROM `quiz_results` GROUP BY monthname(created_at) ORDER BY (created_at) desc;
    ");
        return response()->json([
              'groupsByEtabliss'=>$groupsByEtabliss,
              'QuizRes'=>$QuizRes,
            ]);
    }
}
