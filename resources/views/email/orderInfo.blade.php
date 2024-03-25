@component('mail::message')

<p>Dear valued customer </p>

<p>Your order has been successfully placed.</p>
<p>Thank you for choosing INK@GLAM Salon for your beauty needs.</p></br>


<p>Your Order ID: {{$user->id}}</p>
<p>Total: {{$user->total}}</p>


<p>if you face any problems with your password, please contact us.</p>
<p>+94123456789</p><br/>

Thanks </br>
{{ config('app.name') }}
@endcomponent
