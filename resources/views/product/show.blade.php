@extends('product.layout')
@section('content')
@section('title','Show Imgaes')


<div class="col align-self-start p-5">
    <a  class="btn btn-primary" href="{{route('product.index')}}" > All Product</a>
</div>

 
 
    <div class="mb-3">
       
        <h2>Name: {{$product->name}}</h2>
    </div>
    
    <div class="mb-3">
        <p>{{$product->details}}</p>
    </div>
    <td> <img src="/images/{{$product->image}}" width="300px" ></td>
    
 

</div>

 
@endsection