@component('mail::message')
Cafe Location App OTP Forget Password

Please Paste this OTP required in mobile app.

<center><h1>{{session('otp')}}</h1></center>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
