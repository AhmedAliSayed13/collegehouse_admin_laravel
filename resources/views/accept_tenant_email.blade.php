<h5>Hi {{ $data['name'] }} </h5>
<p>congratulations your group accepted  to hire our house </p>
<p>you can pay security deposit from <a href="{{route('tenant.add_rental_deposit',$data['code'])}}">this Url</a> during 72 hours from now</p>
<p>thank you</p>