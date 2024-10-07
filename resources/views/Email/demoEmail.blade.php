<style>
    .text {
        display: flex;
        justify-content: space-between;
    }
</style>
@component('mail::message')
Message From <b>Mudrankan</b>

<p> &nbsp;&nbsp;&nbsp;&nbsp;
    Dear, {{$mailData['email']}}
    <b>{{$mailData['otp']}}</b> is the OTP for Changing Password in MUDRANKAN EXCLUSIVE STORE. OTP is valid for 10 mins. Pls do not share it with anyone.
</p>
<div class="text">
    <div class="">Thanks,<br>
        {{$mailData['email']}}
    </div>
    <div class="">From,<br>
        <a href="http://127.0.0.1:8000/">www.mudrankan.com</a>
    </div>
</div>
@endcomponent