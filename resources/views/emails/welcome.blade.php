<x-mail::message>
HI:{{$user->name}}
 <h2>hello in the ebraheem website  </h2>

<x-mail::button :url="''">
Enter  
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
