<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\CvUser;
use App\Models\Information;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PDFController extends Controller
{
    public function index($slug , PDF $pdfCreator)
    {
        
        $cv = CvUser::where('slug' , $slug)->first();
        $user = User::find(1);
        return view('PDF.example.index' , compact('user',  'cv'));        
    }
    public function download($slug , PDF $pdfCreator)
    {
        $cv = CvUser::where('slug' , $slug)->first();
        $user = User::find(1);
        $pdf = $pdfCreator->loadView('PDF.example.download', compact('user' , 'cv'));
        $pdf->setOptions(['encoding'=>'utf8','enable_php' => true ,'enable_remote' => true, 'is_html5_parser_enabled' => true]);        
        return $pdf->stream($user->name.'.pdf');
    }
    public function update(Request $request , $id)
    {
        // sleep for a while so we can see the indicator in demo
        // dd($request->all());
        if (isset($request->slow)) {
            usleep(500000);
        }
        if(isset($request->position)){
        
            $cv = CvUser::where('id' , $id)->first();
            $cv->update([
                'position' => $request->value
            ]);
        }
        if(isset($request->birthday)){
            $user = User::find(1);
            $information = Information::where('id' , $user->id)->first();
            $time = strtotime($request->value);
            $time1 = date('Y/m/d', $time);
            $information->update([
                'birthday' => $time1
            ]);
        }
        if(isset($request->phone)){
            $user = User::find(1);
            $information = Information::where('id' , $user->id)->first();
            
            $information->update([
                'phone' => $request->value
            ]);
        }
        if(isset($request->email)){
            $user = User::find(1);
            $information = Information::where('id' , $user->id)->first();
            
            $user->update([
                'email' => $request->value
            ]);
        }
        if(isset($request->address)){
            $user = User::find(1);
            $information = Information::where('id' , $user->id)->first();
            $information->update([
                'address' => $request->value
            ]);
        }
        if(isset($request->website)){
            $user = User::find(1);
            $information = Information::where('id' , $user->id)->first();
            $user->update([
                'website' => $request->value
            ]);
        }

        if (is_array($request->value)) {
            return implode(', ', $request->value);
        } else {
            return $request->value;
        }
    }
    public function test(Request $request)
    {
        // $cv = CvUser::find(1);
        // $cv->forceFill([
        //     'experience' => [
        //         'start_date' => 123
        //     ]
        // ]);
    }
}
