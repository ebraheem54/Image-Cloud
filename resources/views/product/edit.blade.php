@extends('product.layout')
@section('content')
@section('title','Edit')
<div class="col align-self-start p-5">
    <a  class="btn btn-primary" href="{{route('product.index')}}" > All Product</a>
</div>

@if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
  </div>
@endif

<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT') 
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Details</label>
        <textarea class="form-control" name="details" id="" rows="3" >  {{$product->details}} </textarea>
    </div>
    <td> <img src="/images/{{$product->image}}" width="300px" ></td>
    <div class="mb-3">
      
        <input type="file" class="form-control" name="image"/>
    </div>
    
    <button type="submit" class="btn btn-primary">
        Submit
    </button>
    
</form>


</div>

 
@endsection