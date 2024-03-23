@component('mail::message')

<p>Hello {{ $user->name}} </p>


Dear valued customer,

Thank you for choosing INK@GLAM Salon for your beauty needs. To ensure the security of your account and appointments, we have initiated a verification process. Please find your One-Time Password (OTP) below:

{{$payment->remember_token}}

<p>if you face any problems with your password, please contact us.</p>
<p>+94123456789</p><br/>

Thanks </br>
{{ config('app.name') }}
@endcomponent
