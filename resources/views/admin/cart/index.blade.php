@extends('layouts.app')
@section('content')
    @csrf
<table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Course</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%" class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
  
        @if($cart)
            @foreach($cart as $id => $details)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{asset('storage/attachments/'.$details['photo'])}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price" class="price">{{$details['price']}}</td>
                    <td data-th="Quantity">
                        <input name="quantity" type="number" value="{{$details['quantity'] }}" class="form-control quantity qty" />
                    </td>
                   
                        <td data-th="Subtotal" class="text-center subtotal"></td>
                        <td class="text-end">
                            <div class="actions">
                                <a href="{{route('cart.destroy', ['id' => $details['id']])}}" class="btn btn-sm bg-success-light me-2">
                                    Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
              
        </tbody>
        <tfoot>

        <tr>
            <td><a href="" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="3" class="hidden-xs"></td>
            <td class="hidden-xs text-center total"></td>
        </tr>
        </tfoot>
    </table>
  
    @endsection
@push('scripts')
    <script src="{{asset('assets/js/update-quantity.js')}}"></script>
@endpush
