@extends('layouts.app')
@section('content')
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
        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{asset('storage/attachments/'.$details['photo'])}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                        <a href="{{route('cart.update', ['id' => $details['id']])}}" class="btn btn-sm bg-success-light me-2">
                            Tăng
                        </a>
                        <a href="{{route('cart.update', ['id' => $details['id']])}}" class="btn btn-sm bg-success-light me-2">
                            Giảm
                        </a>
                    </td>
                   
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
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
            <td class="hidden-xs text-center"><strong>Total ${{$total}}</strong></td>
        </tr>
        </tfoot>
    </table>
    @endsection
