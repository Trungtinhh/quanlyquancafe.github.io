<div>
    <style>
        body {
            font-family: DejaVu Sans;
        }
    </style>
    <div>
        <div class="card-body">
            <!-- <span class="logo-lg-text-light">UBold</span> -->
            <h5 style="float:right; margin-right:100px;">
                Ngày tạo: {{ now('Asia/Ho_Chi_Minh') }}
                <br>
                ID:#{{ $ID }}
            </h5>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nhân viên Order: </th>
                            <td>{{ $user }}</td>
                        </tr>
                        <tr>
                            <th>Bàn: </th>
                            <td>{{ $table_in }}</td>
                        </tr>
                        <tr>
                            <th>Khu vực: </th>
                            <td>{{ $area_in }}</td>
                        </tr>
                        <tr>
                            <th> Trạng thái: </th>
                            <td>{{ $status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- end .table-responsive -->
            <div class="table-responsive bg-light">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>

                    <tbody id='content_all'>
                        @foreach($invoice_detail as $indetail)
                        <tr>
                            <th scope="row"><span class="badge bg-primary">{{ ++$loop->index }}</span></th>
                            <th scope="row">{{ $indetail->order->drink->drink_name }}</th>
                            <td scope="row">{{ $indetail->order->drink->drinkDetail->price->price_cost }}</td>
                            <td scope="row">
                                {{ $indetail->order->drink_amount }}
                            </td>
                            <td scope="row" class="text-center text-danger">
                                {{ $indetail->order->drink->drinkDetail->price->price_cost*$indetail->order->drink_amount }} VND
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-7"></div>
                <div class="col-5">
                    <table>
                        <tr>
                            <th>Tổng cộng:</th>
                            <th>{{" "}}</th>
                            <th>{{ $total }} VND</th>
                        </tr>
                        <tr>
                            <th>Thuế: </th>
                            <th>{{" "}}</th>
                            <th>{{$percen}} %</th>
                        </tr>
                        <tr>
                            <th>Tổng tiền:</th>
                            <th>{{" "}}</th>
                            <th>{{ empty($percen) ? $total :  $total + ($total*$percen/100) }} VND</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>