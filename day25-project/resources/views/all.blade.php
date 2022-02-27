{{--<h1>{{$data}}</h1>--}}
{{--<h1>{{$shehon}}</h1>--}}


@foreach($students as $student)
    <h1>{{$student['name']}}</h1>
@endforeach
