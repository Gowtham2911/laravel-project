@component('mail::message')


<p>User name : {{$details['name']}}</p>
<p>Password : {{$details['password']}}</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
