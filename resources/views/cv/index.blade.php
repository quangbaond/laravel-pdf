<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        @foreach ($cvs as $cv)
            <div>
                <a href="{{ route('pdf.index' , $cv->slug) }}">{{ $cv->title }}</a>
            </div>            
        @endforeach
    </div>
</body>
</html>