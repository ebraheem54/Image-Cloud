<h1>HELLO FROM INDEX User</h1>

 


<!-- @if(   $name =='ebraheem' && $lastname =='wannous')
<h2>Hllo my name is {{$name}} {{$lastname}}</h2>

@elseif ($name =='ali' && $lastname='mousa')
        <h2>Hllo my name is {{$name}} {{$lastname}}</h2>
@else
        sorry your data is false
@endif -->

<!-- @unless (Auth::check())
    You are not signed in.
@endunless -->
<br>
@isset($name)
    {{$name}} is defined and is not null...
@endisset
 <br>
@empty($name)
     {{$name}} is "empty"...
@endempty