<div>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Gọi món và hóa đơn</a></li>
                            <li class="breadcrumb-item active">Hóa đơn</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Hóa đơn</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class='col-3'>
                            <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nhân viên</th>
                                        <th>Thời gian vào</th>
                                        <th>Thời gian ra</th>
                                        <th>Bàn</th>
                                        <th>Khu vực</th>
                                        <th>Món đã gọi</th>
                                        <th>Tổng tiền</th>
                                        <th>Giảm giá</th>
                                        <th>Trạng thái</th>
                                        <th>Hành dộng</th>
                                    </tr>
                                </thead>

                                <tbody id="content1">
                                    <?php $temp = 0; ?>
                                    @foreach($Invoice as $Invoi=>$invoi)
                                        @foreach($invoi as $in=>$valu)
                                            <tr>
                                                @foreach($valu as $val)
                                                    <?php
                                                        $id = $val->id;
                                                        $time_in = $val->time_in;
                                                        $user_name = $val->user->name;
                                                        $time_out = $val->time_out;
                                                        $money = $val->total;
                                                        $submoney = $val->submoney;
                                                        $status = $val->status;
                                                        $table_id = $val->table_id;
                                                        $table_invoice = $val->order->table->table_name;
                                                        $area_invoice = $val->order->table->area->sub_name;
                                                    ?>
                                                @endforeach
                                                <th scope="row" style="width: 5%;"> <span class="badge bg-warning">{{ $id }}</span></th>
                                                <th scope="row">{{ $user_name }}</th>
                                                <th scope="row">{{ $time_in }}</th>
                                                <th scope="row">{{ $time_out == null ? 'Chưa ra' : $time_out}}</th>
                                                <th scope="row"><span class="badge bg-soft-danger text-danger">{{ $table_invoice }}</span></th>
                                                <th scope="row">{{ $area_invoice }}</th>
                                                <th>
                                                    <table>
                                                        @foreach($valu as $val)
                                                            @if($val->time_in == $Invoi)
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width: 20%;">{{ $val->order->drink_amount }}</th>
                                                                    <th style="width: 80%;">{{ $val->order->drink->drink_name }}</th>
                                                                </tr>
                                                            </tbody>
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                </th>
                                                <th scope="row">{{ $money }} VND</th>
                                                <th scope="row">{{ $submoney }} VND</th>
                                                @if($status == 0)
                                                    <th scope="row">
                                                        <span class="badge bg-soft-danger text-danger">Chưa thanh toán</span>
                                                    </th>
                                                    <th scope="row">
                                                        <button wire:click='showInvoice({{ $in }})' style=' margin-bottom:10px;' data-bs-dismiss="modal" class="btn btn-primary btn-rounded waves-effect waves-light">
                                                            <i class="fe-file-text"></i> Chi tiết
                                                        </button>
                                                    </th>
                                                @else
                                                    <th scope="row">
                                                        <span class="badge bg-soft-success text-success">Đã thanh toán</span>
                                                    </th>
                                                    <th scope="row">
                                                        <button wire:click='printInvoicePayed({{ $in }}, "{{ $Invoi }}")' style=' margin-bottom:10px;' class="btn btn-secondary btn-rounded waves-effect waves-light">
                                                            <i class="fa fa-print mr-1"></i> In
                                                        </button>
                                                    </th>
                                                @endif
                                            </tr>
                                        @endforeach
                                        <?php ++$temp; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="page-title-box">
                            @if($temp == 0)
                            <h6 class="page-title" style="text-align: center;">Trống!</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
    @if($statusShowInvoice)
    <div class="modal fade" wire:ignore.self id="invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">HÓA ĐƠN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card  bg-soft-pink">
                        <div class="card-body">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo_quancf_3.jpg')}}" alt="" height="75">
                            </span>

                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                            <h5 style="float:right; margin-right:100px;">
                                Ngày tạo: {{ now('Asia/Ho_Chi_Minh') }}
                                <br>
                                ID:#{{ $ID }}
                            </h5>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th style="widtd: 35%;">Nhân viên Order: {{ $user }}</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Bàn: {{ $table_in }}</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Khu vực: {{ $area_in }}</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th> Trạng thái: Chưa thanh toán</th>
                                            <td>
                                            </td>
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
                                            <th class="text-center">Thành tiền</th>
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
                                            <th>Giảm giá: </th>
                                            <th>{{" "}}</th>
                                            <th><input class="border-0" type="number" max='{{$total}}' wire:model='percen'> VND</th>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <th>{{" "}}</th>
                                            <th>{{ empty($percen) ? $total :  $total - $percen }} VND</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click='print({{ $ID }}, "{{ $user }}", "{{ $table_in }}", "{{ $area_in }}","{{ $total }}", "{{ $percen }}")' style=' margin-bottom:10px;' class="btn btn-secondary btn-rounded waves-effect waves-light">
                            <i class="fa fa-print mr-1"></i> In
                        </button>
                        <button wire:click='payInvoice({{ $total }})' style=' margin-bottom:10px;' data-bs-dismiss="modal" class="btn btn-success btn-rounded waves-effect waves-light">
                            <i class="fe-check-circle"></i> Thanh toán
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @section('script')
        <script>
            window.addEventListener('show-invoice', event => {
                $('#invoice').modal('show');
            })
        </script>
        <script>
            $(document).ready(function() {
                $("#search").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#content1 tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/dashboard-1.init.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            window.addEventListener('alert', ({
                detail: {
                    type,
                    message
                }
            }) => {
                Toast.fire({
                    icon: type,
                    title: message
                })
            })
        </script>
    @endsection
</div>