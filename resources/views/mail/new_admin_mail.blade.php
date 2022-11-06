@component('mail::message')
# Congratulations

<b>{{ $auth }}</b>, Invited You For Admin From {{ config('app.name') }}!

@component('mail::panel')
Your Email : {{ $email }} <br>
Your Password : {{ $password }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
