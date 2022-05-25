<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index(){

        $userData = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        //dd($userData);


        return view('chart', compact('userData'));
    }

    public function piechart()
    {
        $userD = DB::select("SELECT YEAR(created_at) as Year, COUNT(ID) AS CountUser FROM users GROUP BY YEAR(created_at)");
        $user = User::select(DB::raw("COUNT(*) as count"))
            ->whereName('name','Albi')
            ->groupBy(DB::raw("id"))
            ->pluck('count');

        $userData = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        //dd($userData);
        $num =DB::select("SELECT COUNT(*) as anzahl FROM `posts` WHERE user_id= 1");
        $anzahl = $num[0]->anzahl;// Anzahl von Usern == Albi

        $num2 =DB::select("SELECT COUNT(*) as anzahl FROM `posts` WHERE user_id = 2");
        $anzahl2 = $num2[0]->anzahl;// Anzahl von Usern == Test
        //$num2 = json_encode($num);
        //echo ($anzahl);
        //dd($num[0]);
        $user = User::find(1);
        $user2 = User::find(2);
        $Data= array
        (
            "0" => array
            (
                "y" => $anzahl,
                "name" => $user->name,
            ),
            "1" => array
            (
                "y" => $anzahl2,
                "name" => $user2->name,
            )
        ,
            "2" => array
            (
                "y" => 0,
                "name" => "KeinWert",
            )
        ,
            "3" => array
            (
                "y" => 0,
                "name" => "keinWert",
            )
        );


        return view('piechart', compact('userData','userD','user'), ['Data' => $Data]);
    }
}
