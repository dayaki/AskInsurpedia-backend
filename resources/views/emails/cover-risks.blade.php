@component('mail::message')
# Introduction

Hi {{ $data['name'] }},  


This is to confirm that your request to cover your risks with details below has been received and will be routed to an Askinsurpedia Consultant:  

Risks to cover: {{ $data['risks'] }}  

Please be informed that an askinsurpedia consultant will contact you at your stated preferred time.  

Askinsurpedia consultants are verified professionals in their chosen professions and are required to act in the most ethical manner possible and adhere to their professional conduct especially with respect to their dealing. Nevertheless, this  platform comprise of experts who may offer services of information and advice to seekers. you understand and agree that Askinsurpedia is not a party to any agreements entered into between members and has no control over the conduct of members/experts or other users of the site, application and services or any information provided in connection thereto, and disclaims all liability in this regard.  


**Please visit our T & Cs page for a full description of our terms and conditions of this service.**  

Sincerely yours  
AskInsurpedia Team
@endcomponent
