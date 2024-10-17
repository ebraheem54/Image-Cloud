 
@extends('product.layout')
@section('content')
@section('title','Product')
 
  </div>

@if($message= Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
@endif

<div class="table-responsive">
    <table   class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
          
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>image</th>
                <th>details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <br>
        <tbody class="table-group-divider">
            @foreach ( $product as $item )
            
         
            <tr class="table-primary" >
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td> <img src="/images/{{$item->image}}" width="300px" ></td>
                <td>{{$item->details}}</td>
                <td>
                  
                    @Auth
                    <form action="{{route('product.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                     
                         <a class="btn btn-primary" href="{{route('product.edit',$item->id)}}">Edit</a>
                            @endAuth


                 <a class="btn btn-info" href="{{route('product.show',$item->id)}}">Show</a>   
               </td>
            </tr>
            @endforeach    
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
    {!! $product->links() !!}
</div>

@endsection
 