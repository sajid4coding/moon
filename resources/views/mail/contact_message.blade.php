@component('mail::message')
# Reply Message

@component('mail::panel')
Name : {{ $info['name'] }} <br>
Email : {{ $info['email'] }} <br>
Subject : {{ $info['subject'] }} <br>
Message : {{ $info['message'] }}
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
