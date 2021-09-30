@component('mail::message')


<p>{{ $details['title'] }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
