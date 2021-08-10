@if($data['type']==1)
<p>Hi </p>
<p>MR. {{ $data['name'] }} to join visit </p> <a href="{{url('/step1?code='.$data['code'])}}">this link</a> <p> and fill your application </p>
@endif

@if($data['type']==2)
<p>Hi {{ $data['name'] }} </p>
<p>Mr. {{ $data['tenant'] }} fill apliaction to join to our houses</p> 
@endif