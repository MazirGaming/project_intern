@extends('layouts.app')
@section('content')
<form action="{{route('cart.update')}}" method="post">
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
            @php
                $total = 0;
            @endphp
            @if($cart)
            @foreach($cart as $id => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{asset('storage/attachments/'.$details['photo'])}}"
                                width="100" height="100" class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price" class="price">{{$details['price']}}</td>
                <td data-th="Quantity">
                    <input name="quantity[{{ $details['id'] }}]" type="number" value="{{$details['quantity'] }}"
                        class="form-control quantity qty" />
                </td>

                <td data-th="Subtotal" class="text-center subtotal">${{ $details['price'] * $details['quantity'] }}</td>
                <td class="text-end">
                    <div class="actions">
                        <a href="{{route('cart.destroy', ['id' => $details['id']])}}"
                            class="btn btn-sm bg-success-light me-2">
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
                <td><a href="/home" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="3" class="hidden-xs"></td>
                <input name="total" type="hidden" value="{{$total}}">
                <td class="hidden-xs text-center total"><strong>Total ${{$total}}</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="text-end" style="display: flex; justify-content: center">
        <button type="submit" class="btn btn-primary" name="submit" style="padding: 10px 30px; margin: 0 auto;">Cập nhật
            số lượng</button>
    </div>
    <td>
        <div style="display: flex; justify-content: center; margin-top: 15px">
            <input style="padding: 8px 50px" type="submit" formaction="{{route('cart.check.out')}}" class="noborder"
                value="Thanh Toán" alt="Checkout" />
        </div>
    </td>
</form>
@endsection