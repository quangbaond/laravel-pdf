<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\CvUser;
use App\Models\Information;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class PDFController extends Controller
{
    
    public function index($slug , PDF $pdfCreator)
    {
        // dd(Auth::user());
        $cv = CvUser::where('slug' , $slug )->first();
        if(is_null($cv)){
            $skill = [
                [
                    'name' => 'Tin học văn phòng',
                    'content' => 'Sử dụng thành thạo các công cụ Word, Excel,Photoshop, figma'
                ],
                [
                    'name' => 'Tin học văn phòng',
                    'content' => 'Sử dụng thành thạo các công cụ Word, Excel,Photoshop, figma'
                ],
    
                
            ];
            $education = [
                [
                    'start_date' => now(),
                    'end_date' => now(),
                    'education_title' => "Đại học FPT",
                    'education_content' => "Công nghê thông tin"
                ],
                [
                    'start_date' => now(),
                    'end_date' => now(),
                    'education_title' => "Đại học FPT",
                    'education_content' => "Công nghê thông tin"
                ],
                
            ];
            $experience = [
                [
                    'start_date' => now(),
                    'end_date' => now(),
                    'experience_title' => "Công ty Mcew-tech",
                    'experience_content' => 'abcxyz'
                ],
                [
                    'start_date' => now(),
                    'end_date' => now(),
                    'experience_title' => "Công ty Mcew-tech",
                    'experience_content' => 'abcxyz'
                ],
                
            ];
            $cvSlug = CvUser::create([
                'user_id' => Auth::user()->id,
                'cv_id' => 1,
                'slug' => $slug,
                'title' => Auth::user()->name,
                'position' => 'Thực tập sinh',
                'target' => 'Áp dụng những kinh nghiệm về kỹ năng  và sự hiểu biết về khoa , ngành để trở thành một nhân viên  chuyên nghiệp, mang đến nhiều giá trị , lợi
                ích cho Công ty.
                Mong muốn được cống hiến năng lực để phát triển Công ty',
                'education' => json_encode($education),
                'experience' => json_encode($experience),
                'interests' => 'Chơi game và coding , thích sáng tạo, học ngôn ngữ mới, đọc tài liệu',
                'skill' => json_encode($skill)
            ])->slug;
            $cv = CvUser::where('slug' , $cvSlug )->first();
        }
        $user = User::find(auth()->user()->id);
        $information = Information::create([
            'user_id' => $user->id,
        ]);
        
        return view('PDF.example.index' , compact('user',  'cv'));        
    }

    /*
    * render stream 
    */
    public function download($slug , PDF $pdfCreator)
    {
        $cv = CvUser::where('slug' , $slug)->first();
        if(is_null($cv)){
            abort(404);
        }   
        $user = User::find(auth()->user()->id);
        $avatar = $user->defaultProfilePhotoUrl();
        if(!is_null(Auth::user()->profile_photo_path)){ 
            $data = storage_path('app/public/'.Auth::user()->profile_photo_path);
            $avatar = base64_encode(file_get_contents($data));
        }
        
        $pdf = $pdfCreator->loadView('PDF.example.download', compact('user' , 'cv' , 'avatar'));
        $pdf->setOptions(['isRemoteEnabled' => true]);
        return $pdf->stream($user->name.'.pdf');
    }
    /*
    * update infomation and CV
    */
    public function update(Request $request , $id)
    {
        $user = User::find(Auth::user()->id);
        $information = Information::where('id' , $user->id)->first();
        $cv = CvUser::where('id' , $id)->first();
        
        // sleep for a while so we can see the indicator in demo
        if (isset($request->slow)) {
            usleep(500000);
        }
        if(isset($request->position)){
            $cv->update([
                'position' => $request->value
            ]);
        }
        if(isset($request->target)){
        
            $cv->update([
                'target' => $request->value
            ]);
        }
        if(isset($request->fullname)){
        
            $user->update([
                'name' => $request->value
            ]);
        }
        if(isset($request->interests)){
        
            $cv->update([
                'interests' => $request->value
            ]);
        }
        if(isset($request->website)){
        
            $information->update([
                'website' => $request->value
            ]);
        }
        if(isset($request->phone)){
        
            $information->update([
                'phone' => $request->value
            ]);
        }
        if(isset($request->address)){
        
            $information->update([
                'address' => $request->value
            ]);
        }
        
        if(isset($request->gender)){
            
            if($request->value == 'Nam' || $request->value == 'nam'){
                $gender = 1;
            }
            else {
                $gender = 2;
            }
            $information->update([
                'gender' => $gender
            ]);
        }
        if(isset($request->birthday)){
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
}
