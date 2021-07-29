@component('mail::message')
<b>Habari</b>

Bonyeza Kitufe hiki kuthibitisha Barua Pepe yako

@component('mail::button', ['url' => route('verification.button', [auth()->user()->email, $code])])
Thibitisha
@endcomponent
<p>Au tumia Namba hii ya uthibitisho</p>
<p><span style="font-size: 20px; font-weight: bold; letter-spacing: 5px; text-align: center">{{$code}}</span></p>
Asante,<br>
{{ config('app.name') }}
@endcomponent
