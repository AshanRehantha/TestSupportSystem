@component('mail::message')
# Introduction

Hello {{$data->user_name}}

Your issue {{$data->ticket_id}} is resolved. We are closing the ticket now. If there is anything else you need help with, feel free to reply to this email or call us at +940235965236. We will be happy to help.
<br/>
Your Ref Id : {{$data->ticket_id}}
<br/>
Check your Ticket : <a href="<?= url('ticket/' . $data->ticket_id); ?>">Please Click The Link</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
