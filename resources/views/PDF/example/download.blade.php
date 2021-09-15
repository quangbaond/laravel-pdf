<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>

    </style>


    <title>{{ $title ?? 'PDF' }}</title>
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');

        body{
            font-family: 'Dejavu Sans';
            font-size: 14px;
        }
      
  
        #avatar {
            border: 0;
            width: 3cm;
            height: auto;
            margin: 0 auto;
            width: 4.2cm;
            min-height: 4.2cm;
            vertical-align: top;
        }
        #avatar img {
            border: 0;
            width: 3cm;
            height: auto;
            margin: 0 auto;
        }

        #Milo {
            width: 210mm;
            padding: 2mm;
            min-height: 200mm;

        }

        h5 {
            display: block;
            font-size: 11pt;
            line-height: 12pt;
            color: #000050;
            vertical-align: top;
        }
        .row{
                    /* border-bottom: .05cm solid #eee; */
            line-height: 15pt;
            padding: .15cm 0;
        }
        .col-sm-3{
            padding: 1mm 0;
            width: 5cm;
            float: left;
        }
        h3 {
            display: block;
            font-size: 24pt;
            line-height: 24pt;
            font-weight: 700;
            color: #0e2452;
            text-transform: capitalize;
        }

        p {
            line-height: 14pt;
            font-size: .9em !important;
        }

        p.profile-title {
            display: inline-block;
            width: 2.8cm;
            font-weight: 700;
            font-style: normal;
            vertical-align: top;
        }

        p.profile-content {
            display: inline-block;
            min-width: 3cm;
            max-width: 8.7cm;
        }

        .title {
            color: #000;
            font-size: 12pt;
            line-height: 18pt;
            margin-bottom: 5pt;
            border-bottom: 1pt solid #333;
            text-transform: uppercase;
            font-weight: 700;
        }

        .content {
            padding-top: .2cm;
        }

        .content p {
            display: block;
            line-height: 15pt;
            min-width: 12cm;
            text-align: justify;
        }

        .border-bottom {
            border-bottom: 1px solid #eee;
        }

        .orther-page {
            page-break-before: always
        }
        #cvo-profile-fullname{
            font-weight: 700;
        }

    </style>

</head>

<body>

    <div id="Milo" class="container">
        <div id="wrap_information">
            <div id="cvo-profile" class="cvo-block">
                <table class="profile-table">
                    <tbody>
                        <tr>
                            <td class="avatar-wraper" id="avatar" rowspan="9">
                                <img id="cvo-profile-avatar"
                                    src="{{ !is_null($user->profile_photo_path) ? 'data:image/png;base64,'. $avatar : 'https://ui-avatars.com/api/?name=Nguy%E1%BB%85n+Quang+B%E1%BA%A3o&color=7F9CF5&background=EBF4FF' }}"
                                    value="" alt="avatar">
                            </td>
                            <td>
                                <span id="cvo-profile-fullname">{{ $user->name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span id="cvo-profile-title">{{ $cv->position }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-label">Ngày sinh: </span>
                                <span class="profile-field" id="cvo-profile-dob">{{ $user->information->birthday }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-label">Giới tính: </span>
                                <span class="profile-field" id="cvo-profile-gender">
                                    {{ $user->information->gender == 1 ? "Nam" : "Nữ" }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-label">Điện thoại: </span>
                                <span class="profile-field" id="cvo-profile-phone">
                                    {{ $user->information->phone }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-label">Email: </span>
                                <span class="profile-field" id="cvo-profile-email">
                                    
                                    {{ $user->email }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-label">Địa chỉ: </span>
                                <span class="profile-field" id="cvo-profile-address">
                                    {{ $user->information->address }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-label">Website: </span>
                                <span class="profile-field" id="cvo-profile-website"><a
                                        href="{{ $user->information->website }}" target="_blank"
                                        class="cvo-clickable-link">{{ $user->information->website }}</a></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="wrap_content">
            <div class="my-2" id="target">
                <h3 class="title">Mục tiêu nghề nghiệp</h3>
                <div class="content">
                    <p>{{ $cv->target }}</p>
                </div>
            </div>
            <div class="my-2" id="education">
                <h3 class="title">Học vấn</h3>

                @foreach (json_decode($cv->education, true) as $education)
                    <div class="row border-bottom content">
                        <div class="col-sm-3">
                            <p>
                                <span>
                                    {{ \Carbon\Carbon::parse($education['start_date'])->format('d/m/Y') }}
                                </span>
                                -
                                {{ \Carbon\Carbon::parse($education['end_date'])->format('d/m/Y') }}
                            </p>
                        </div>
                        <div class="col">
                            <p><b>{{ $education['education_title'] }}</b></p>
                            <p>{{ $education['education_content'] }}</p>
                        </div>
                    </div>
                @endforeach



            </div>

            <div class="my-2 " id="experience">
                <h3 class="title">Kinh nghiệm</h3>

                @foreach (json_decode($cv->experience, true) as $education)
                    <div class="row border-bottom content">
                        <div class="col-sm-3">
                            <p>
                                <span>
                                    {{ \Carbon\Carbon::parse($education['start_date'])->format('d/m/Y') }}
                                </span>
                                -
                                {{ \Carbon\Carbon::parse($education['end_date'])->format('d/m/Y') }}
                            </p>
                        </div>
                        <div class="col">
                            <p><b>{{ $education['experience_title'] }}</b></p>
                            <p>{{ $education['experience_title'] }}</p>
                            <div class="experience-detail">
                                abc
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="my-2 " id="experience">
                <h3 class="title">Các kĩ năng</h3>

                @foreach (json_decode($cv->skill, true) as $skill)
                    <div class="row border-bottom content">
                        <div class="col-sm-3">
                            <p>
                                <b >
                                    {{ $skill['name'] }}
                                </b>
                                
                            </p>
                        </div>
                        <div class="col">
                            
                            <p>{{ $skill['content'] }}</p>
                            
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="my-2" id="interests">
                <h3 class="title">Sở thích</h3>
                <div class="content">
                    <p>{{ $cv->interests }}</p>
                </div>
            </div>
            <div class="my-2" id="description">
                <h3 class="title">Thông tin thêm</h3>
                <div class="content">
                    <p>{{ $cv->description }}</p>
                </div>
            </div>

        </div>
    </div>





</body>

</html>
