@component('mail::message')
# Application to be an expert on AskInsurpedia

You have a new Applicant, the details below:  

Name: {{ $data['name'] }}  

Specialties: {{ $data['specialty'] }}  

Experience: {{ $data['experience'] }}  

Be a Consultant: {{ $data['consultant'] }}  

Bio: {{ $data['bio'] }}  

@component('mail::button', ['url' => {{ $data['url'] }}])
See the application
@endcomponent

Thanks,<br>
AskInsurpedia MailBot
@endcomponent
