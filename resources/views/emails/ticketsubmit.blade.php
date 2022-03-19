@component('mail::message')
# Introduction

Hello {{$data->customer_name}}

Your issue {{$data->customer_problem_discripction}} is currently being worked on by our Team team. We will get back to you in Few hours. Thank you for your patience.
<br/>
Your Ref Id : {{$code}}
<br/>
Your Contact Number : {{$data->phone_number}}
<br/>
Check your Ticket : <a href="<?= url('ticket/' . $code); ?>">Please Click The Link</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
