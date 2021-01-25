@component('mail::message')
# new "Cover my risks" enquiry

You have a new "Cover my risks" enquiry, the details below:  

Name: {{ $data['name'] }}  

Email: {{ $data['email'] }}  

Phone: {{ $data['phone'] }}  

Risks to cover: {{ $data['risks'] }}  

Time to contact: {{ $data['contact'] }}

Thanks,<br>
AskInsurpedia MailBot
@endcomponent
