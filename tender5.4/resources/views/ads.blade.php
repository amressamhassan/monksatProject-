@component('mail::message')
#{{$title}}

{{$des}}.

This is your logo
![Some option text][logo]

[logo]: {{asset('site/img/images.jpg')}} "Logo"

<img src="{{asset('site/img/images.jpg')}}" alt="this is image">
Here's that image we talked about sending:


Thanks!
Thanks,<br>
{{ config('app.name') }}
@endcomponent
