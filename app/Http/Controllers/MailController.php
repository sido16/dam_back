<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
use App\Models\Viva;


class MailController extends Controller
{
    public function SendMail(Request $request)
    {    

        //I don't know if there is a simpler way to get these values separately
        $name=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Pr_Name');
        $year=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Anee');

        $Fst_Student=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Fst_Student');
        $Sst_Student=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Sst_Student');
        $Tst_Student=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Tst_Student');
        
        $Sup=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Supervisor');
        $Ex=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Examiner');
        $Pr=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('President');

        $Sp_Mark=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Sp_Mark');
        $Ex_Mark=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Ex_Mark');
        $Pr_Mark=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Pr_Mark');
        $Final_Mark=DB::table('vivas')->where('Pr_Key','=',$request->id)->get()->value('Final_Mark');

       
            $data = ['name' => $name,'year'=> $year,'Fst_Student'=>$Fst_Student,'Sst_Student'=>$Sst_Student,
            'Tst_Student'=>$Tst_Student,'Sup'=>$Sup,'Ex'=>$Ex,'Pr'=>$Pr,
            'Sp_Mark' => $Sp_Mark,'Ex_Mark' => $Ex_Mark,'Pr_Mark' => $Pr_Mark,'Final_Mark' => $Final_Mark];

    
        Mail::to('test@gmail.com' )-> send(new UserMail($data)) ;

        return response()->json([
            'msg' => 'email sent', ]);

    }
}