<div class="content">
    @csrf
    <div class="container-fluid">
        <div class="row">
            </a>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Simple Table</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body" >
                        <div class="table-responsive" >
                            <form action="">
                                <div class="cartrm" data-url="{{route('shop.removecart')}}">
                                <table class="table updatecart" data-url="{{route('shop.updatecart')}}">
                                    <thead class=" text-primary">
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quatity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                    </thead>
                                    <tbody>
                                    @php
                                        $total=0;
                                    @endphp
                                    @if(!$cart==null)
                                    @foreach($cart as $id=>$food)
                                        @php
                                            $total +=$food['price']*$food['quantity'];
                                        @endphp
                                    <tr>

                                        <td>{{$food['name']}}</td>
                                        <td><img style="width: 100px; height: 100px"
                                                 src="{{asset('storage/'.$food['image'])}}" alt=""></td>
                                        <td>{{number_format($food['price'])}}$</td>
                                        <td><input type="number" value="{{$food['quantity']}}" min="1"></td>
                                        <td>{{number_format($food['price']*$food['quantity'])}}$</td>
                                        <td>
                                            <a data-id="{{$id}}" class="btn btn-primary cartUpdate">Update</a>
                                            <a remove-id="{{$id}}" class="btn btn-danger cartRemove">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    <h3>Total:{{number_format($total)}}$</h3>
                                </div>
                                    <div class="col-md-12">
                                        <a href="{{route('shop.order')}}" class="btn btn-primary">Payment</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
