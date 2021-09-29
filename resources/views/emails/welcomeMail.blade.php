@component('mail::message')


<p>{{$details['name']}}</p>
<p>{{$details['password']}}</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
