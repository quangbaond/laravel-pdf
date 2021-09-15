<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/PDF/example.css') }}">
   
</head>

<body>
    <div id="cvo-document-root">
        <div id="cvo-document" class="cvo-document">
            <div class="cvo-page">
                <div class="cvo-subpage">
                    <div id="cvo-body">

                        <div id="cvo-main">

                            <div id="group-header">

                                <div id="cvo-profile" class="cvo-block">
                                    <table class="profile-table">
                                        <tbody>
                                            <tr>
                                                <td class="avatar-wraper" rowspan="9">
                                                    <img id="cvo-profile-avatar"
                                                        src="{{ Auth::user()->profile_photo_url ?? asset('user.png') }}"
                                                        alt="avatar">
                                                </td>
                                                <td>
                                                    <span id="cvo-profile-fullname">{{ $user->name }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="cvo-profile-title">{{ $cv->position ?? 'Thực tập sinh'}} </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="profile-label">Ngày sinh: </span>
                                                    <span class="profile-field" id="cvo-profile-dob">{{ !is_null($user->information->birthday) ?  \Carbon\Carbon::parse($user->information->birthday)->format('m/d/Y') : \Carbon\Carbon::now()->format('m/d-Y') }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="profile-label">Giới tính: </span>
                                                    <span class="profile-field" id="cvo-profile-gender">{{ $user->information->gender == 1 ? "Nam" : "Nữ" }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="profile-label">Điện thoại: </span>
                                                    <span class="profile-field"
                                                        id="cvo-profile-phone">{{ $user->information->phone ?? '039'}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="profile-label">Email: </span>
                                                    <span class="profile-field"
                                                        id="cvo-profile-email">{{ $user->email }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="profile-label">Địa chỉ: </span>
                                                    <span class="profile-field" id="cvo-profile-address">{{ $user->information->address }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="profile-label">Website: </span>
                                                    <span class="profile-field" id="cvo-profile-website">{{ $user->information->website ?? config('app.url') }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div id="group-content">
                                <div id="cvo-objective" class="cvo-block">
                                    <h3 class="cvo-block-title"><span id="cvo-objective-blocktitle">Mục tiêu nghề
                                            nghiệp</span></h3>
                                    <div class="cvo-block-body">
                                        <div id="cvo-objective-objective">{{ $cv->target }}</div>
                                    </div>
                                </div>
                                <div id="cvo-education" class="cvo-block">
                                    <h3 class="cvo-block-title"><span id="cvo-education-blocktitle">Học vấn</span></h3>
                                    <div id="education-table">
                                        @foreach (json_decode($cv->education, true) as $education)
                                        <div class="row ">
                                            <div class="cvo-education-time col-time">
                                                <span class="cvo-education-start start">{{ \Carbon\Carbon::parse($education['start_date'])->format('m-d-Y') }}
                                                </span>
                                                -
                                                <span class="cvo-education-end end">
                                                    {{ \Carbon\Carbon::parse($education['end_date'] )->format('m-d-Y') }}
                                                  
                                                </span>
                                            </div>
                                            <div class="school">
                                                <span class="cvo-education-school">{{ $education['education_title'] }}</span>
                                                <span class="cvo-education-title">{{ $education['education_content'] }}</span>
                                            </div>
                                            <div style="clear: both"></div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                <div id="cvo-experience" class="cvo-block">
                                    <h3 class="cvo-block-title"><span id="cvo-experience-blocktitle">Kinh nghiệm làm
                                            việc</span></h3>
                                    <div id="experience-table">
                                        @foreach (json_decode($cv->experience , true) as $experience)
                                            
                                        @endforeach
                                        <div class="row ">
                                            <div class="cvo-experience-time col-time">
                                                <span class="cvo-experience-start start">
                                                    {{ \Carbon\Carbon::parse($experience['start_date'] )->format('m-d-Y') }}
                                                    
                                                </span>
                                                -
                                                <span class="cvo-experience-end end">
                                                    {{ \Carbon\Carbon::parse($experience['end_date'] )->format('m-d-Y') }}
                                                </span>
                                            </div>
                                            <div class="company">
                                                <span class="cvo-experience-company">
                                                    {{ $experience['experience_title'] }}
                                                </span>
                                                <span class="cvo-experience-position">
                                                    {{ $experience['experience_content'] }}
                                                </span>
                                                <div class="cvo-experience-details">
                                                    {{ $experience['detail'] ?? 'abc' }}        
                                                </div>
                                            </div>
                                            <div style="clear: both"></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div id="cvo-certification" class="cvo-block">
                                    <h3 class="cvo-block-title"><span id="cvo-certification-blocktitle">Chứng chỉ</span>
                                    </h3>
                                    <div id="certification-table">
                                        <div class="row ">
                                            <div class="cvo-certification-time-wraper col-time">
                                                <span class="cvo-certification-time">2019</span>
                                            </div>
                                            <div class="details">
                                                <span class="cvo-certification-title">Program PHP Application Web MVC
                                                    tại Devmaster Hà Nội</span>
                                            </div>
                                            <div style="clear: both"></div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div id="cvo-skillgroup" class="cvo-block">
                                    <h3 class="cvo-block-title"><span id="cvo-skillgroup-blocktitle">Các kỹ năng</span>
                                    </h3>
                                    <div id="skill-table">
                                        @foreach (json_decode($cv->skill , true) as $skill)
                                        <div class="row">
                                            <div>
                                                <span class="cvo-skillgroup-area">
                                                    {{ $skill['name'] }}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="cvo-skillgroup-skill-description">
                                                    {{ $skill['content'] }}
                                                </span>
                                            </div>
                                            <div style="clear: both"></div>
                                        </div>
                                        @endforeach
                                        
                                        
                                    </div>
                                </div>
                                <div id="cvo-interests" class="cvo-block">
                                    <h3 class="cvo-block-title"><span id="cvo-interests-blocktitle">Sở thích</span></h3>
                                    <div class="cvo-block-body">
                                        <span id="cvo-interests-interests">{{ $cv->interests ?? 'Nhảy dây' }}</span>
                                    </div>
                                </div>
                                {{-- <div id="cvo-additional-info" class="cvo-block">
                                    <div class="cvo-block-title"><span id="cvo-additional-info-blocktitle">Thông tin
                                            thêm</span></div>
                                    <div id="cvo-additional-information-details">{{ $cv->description ?? 'Thông tin thêm' }}</div>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <a style="position : fixed; top :50%; right: 10px; display:block; width : 50px; height : 50px; border-radius:50%; background-color: yellow; text-align:center;" href="{{ route('pdf.download' , $cv->slug) }}">
    💟</a>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery.jeditable.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script>
        const url = "{{ route('api.update' , $cv->id) }}"
        const token = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('editor.js') }}"></script>
</body>

</html>
