@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Price</th>
            @can('product-edit')  <th>Activation</th>  @endcan
            <th>Stock</th>
            <th width="280px">Action</th>
        </tr>

	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->title }}</td>
	        <td>{{ $product->price }}$</td>


            @can('product-edit')
               <td>
                        @if($product->active == '1')
                                <label class="py-2 px-3 badge btn-danger">Non Active </label>
                            @elseif($product->active == '0')
                                <label class="py-2 px-3 badge btn-primary"> Active</label>
                            @endif
                </td>
                @endcan
                <td>{{ $product->stock }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach

    </table>


    {!! $products->links() !!}



@endsection
