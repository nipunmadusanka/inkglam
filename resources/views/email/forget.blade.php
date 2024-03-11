@component('mail::message')

<p>Hello {{ $user->name}} </p>

@component('mail::button', ['url' => url('reset-password/'.$user->remember_token)])
Reset Your Password
@endcomponent

<p>are you face any problems with your password, please contact us.</p>
<p>+94123456789</p><br/>

Thanks </br>
{{ config('app.name') }}
@endcomponent
