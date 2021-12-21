<div>
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <form class="d-flex align-items-center mb-3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control border-0 shadow" id="dash-daterange">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range"></i>
                                    </span>
                                </div>
                                <a href="javascript: void(0);" class="btn btn-primary btn-sm ms-2">
                                    <i class="mdi mdi-autorenew"></i>
                                </a>
                                <a href="javascript: void(0);" class="btn btn-primary btn-sm ms-1">
                                    <i class="mdi mdi-filter-variant"></i>
                                </a>
                            </form>
                        </div>
                        <h4 class="page-title">Gọi món</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12">
                    <div class='row bg-primary'>
                        <div class='col-12 border-bottom border-primary rounded text-center'>
                            <h4 class="text-light ">Danh sách bàn</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <form class="search-bar p-3" wire:submit.prevent=''>
                                <div class="position-relative" style="z-index:1">
                                    <input type="text" wire:model='search' class="form-control" placeholder="Tìm tên bàn...">
                                    <span class="mdi mdi-magnify"></span>
                                    @if(!empty($search))
                                        @if(!empty($search_table))
                                            <div class="row">
                                                <div class="position-absolute">
                                                    <ul class="list-group">
                                                        @foreach($search_table as $search =>$value)
                                                            <li class="list-group-item justify-content-between align-items-center">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        {{ $value['table_name'] }}
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class='badge bg-primary rounded-pill'>{{ $value['status'] == 0 ? 'Trống': 'Có người'}}</div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class='text-end rounded-pill'>
                                                                            @if($value['status'] == 0)
                                                                                <button wire:click="showOrder({{ $value['id'] }})" class="btn btn-success btn-rounded waves-effect waves-light">
                                                                                    <i class="mdi mdi-file-edit" title='Gọi món'></i>
                                                                                </button>
                                                                            @else
                                                                                <button wire:click='showOrder({{ $value["id"] }})' class="btn btn-warning btn-rounded waves-effect waves-light">
                                                                                    <i class="mdi mdi-plus-circle" title='Thêm món'></i>
                                                                                </button>
                                                                                @canany(['system.configuration.management', 'system.permission.management'])
                                                                                    <button wire:click='showMoveTable({{ $value["id"] }})' class="btn btn-primary btn-rounded waves-effect waves-light">
                                                                                        <i class="fe-corner-up-right" title='Chuyển bàn'></i>
                                                                                    </button>
                                                                                    <button wire:click='showInvoice({{ $value["id"] }})' class="btn btn-secondary btn-rounded waves-effect waves-light">
                                                                                        <i class="fe-file-text" title='Chi tiết'></i>
                                                                                    </button>
                                                                                @endcanany
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @else
                                            <div class="list-item text-center">Không tìm thấy!</div>
                                        @endif
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    @if(!empty($area))
                        @foreach($area as $a)
                            <div class='row text-end'>
                                <div class='col-12 border-bottom border-primary rounded'>
                                    <h5 class="text-danger font-22">{{ $a->sub_name }}</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row" id='content'>
                                @if(!empty($table))
                                    <?php $dem = 0; ?>
                                    @foreach($table as $value)
                                        @if($value->sub_id == $a->id)
                                            <div class="col-3" style="z-index:0">
                                                <div class="widget-rounded-circle card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="avatar-lg rounded-circle bg-danger w-100 h-100">
                                                                    <i style="font-size:large;" class="fe-card avatar-title text-light text-center">{{ $value->table_name }}</i>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="dropdown float-end">
                                                                    <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        @if($value->status == 0)
                                                                            <a class="dropdown-item" wire:click='showOrder({{ $value->id }})'>Gọi món</a>
                                                                        @else
                                                                            <a class="dropdown-item" wire:click='showOrder({{ $value->id }})'>Thêm món</a>
                                                                            @canany(['system.configuration.management', 'system.permission.management'])
                                                                                <a class="dropdown-item" wire:click='showMoveTable({{ $value->id }})'>Chuyển bàn</a>
                                                                                <a class="dropdown-item" wire:click='showInvoice({{ $value->id }})'>Chi tiết</a>
                                                                            @endcanany
                                                                        @endif
                                                                    </div>
                                                                </div> <!-- end dropdown -->
                                                                <div>
                                                                    @if($value->status == 0)
                                                                        <img src='{{ asset("image/table_empty.png") }}' class="w-75">
                                                                        <p class="text-muted mb-1 text-truncate">Trống</p>
                                                                    @else
                                                                        <img src='{{ asset("image/table_4.png") }}' class="w-75">
                                                                        <p class="text-muted mb-1 text-truncate">Có người</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row-->
                                                    </div>
                                                </div> <!-- end widget-rounded-circle-->
                                            </div> <!-- end col-->
                                            <?php $dem++; ?>
                                        @endif
                                    @endforeach
                                    @if($dem == 0)
                                        <div class="row">
                                            <div class='col-12 text-center'>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class='text-danger'>HẾT BÀN <i data-feather="alert-octagon" class="icon-dual-danger"></i></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div> <!-- container -->
                        @endforeach
                    @endif
                </div> <!-- end col-->
            </div>
        </div> <!-- container -->
    </div>
    @if($statusOrder)
        <div class="modal fade" wire:ignore.self id="order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full-width">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Gọi món</h4>
                        <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <br>
                                        <br>
                                        <h4 class="text-center">Chọn món</h4>
                                        <br>
                                        <form class="search-bar p-3" wire:submit.prevent=''>
                                            <div class="position-relative">
                                                <input type="text" wire:model='searchDrink' class="form-control" placeholder="Tìm tên thức uống...">
                                                <span class="mdi mdi-magnify"></span>
                                                @if(!empty($searchDrink))
                                                    @if(!empty($search_drink))
                                                        <div class="row">
                                                            <div>
                                                                <ul class="list-group">
                                                                    @foreach($search_drink as $search)
                                                                    <li class="list-group-item justify-content-between align-items-center">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                {{ $search->drink_name }}
                                                                            </div>
                                                                            <div class="col-2">
                                                                                <div class='badge bg-primary rounded-pill'>{{ $search->price->price_cost }}</div>
                                                                            </div>
                                                                            <div class="col-6 text-center">
                                                                                @if($search->drink->category == 1)
                                                                                    <div class="row">
                                                                                        @if($search->amount == 0)
                                                                                            <div class="col-6">
                                                                                                <div class='badge bg-danger rounded-pill'>Hết</div>
                                                                                            </div>
                                                                                        @else
                                                                                            <div class="col-6">
                                                                                                <div>
                                                                                                    <input type="number" wire:model.defer='drink_amount' min='0' max='{{ $search->amount }}' class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="col-6">
                                                                                            <div>
                                                                                                <div class='badge bg-danger rounded-pill'>{{ $search->provider->provider_name ." - ". $search->date_exp }}</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="col-6">
                                                                                        <input type="number" wire:model.defer='drink_amount' min='0' class="form-control">
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-2 text-end">
                                                                                <div class='text-end rounded-pill'>
                                                                                    <button wire:click='addDrinkToOrder({{ $search->drink_id }})' data-bs-target="#create-drink_amount" data-bs-toggle="modal" class="btn btn-success btn-rounded waves-effect waves-light">
                                                                                        <i class="mdi mdi-check" title='Chọn'></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="avatar-lg rounded-circle bg-danger w-100 h-100">
                                                    <i style="font-size:44px;" class="fe-card avatar-title text-light text-center">{{ $table_order['table_name'] }}</i>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div>
                                                    <img src='{{ asset("image/table_empty.png") }}' class="w-75">
                                                    <p class="text-muted mb-1 text-truncate">Đang gọi món</p>
                                                </div>
                                            </div>

                                        </div> <!-- end row-->
                                        <br>
                                        <br>
                                        <h5>Món đã chọn</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên</th>
                                                        <th>Giá</th>
                                                        <th class="text-center">Số lượng</th>
                                                        <th class="text-center">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $temp = 0 ?>
                                                    @if(!empty($order))
                                                        @foreach($order as $drink)
                                                            <tr>
                                                                <th scope="row"><span class="badge bg-primary">#{{ $drink->drink_id }}</span></th>
                                                                <th scope="row">{{ $drink->drink->drink_name }}</th>
                                                                <th scope="row">{{ $drink->drink->drinkDetail->price->price_cost }} VND</th>
                                                                <th scope="row" class="text-center" style="width:10%;">
                                                                    {{ $drink->drink_amount }}
                                                                </th>
                                                                <td scope="row" class="text-center">
                                                                    <button wire:click='deleteDrinkOrder({{ $drink->id }})' class="btn btn-danger btn-rounded waves-effect waves-light">
                                                                        <i class="mdi mdi-delete" title='Xóa'></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <?php $temp++ ?>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <div class="page-title-box">
                                                @if($temp == 0)
                                                    <h6 class="page-title" style="text-align: center;"><i data-feather="alert-triangle" class="icon-dual-danger"></i>Trống !</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button wire:click='resetOrder' data-bs-dismiss="modal" style='padding-left: 30px;padding-right: 30px;' class="btn btn-secondary"><i class="dripicons-cross"></i> HỦY </button>
                            <button wire:click='addOrder' data-bs-dismiss="modal" style='padding-left: 30px;padding-right: 30px;' class="btn btn-success"><i class='fa fa-check-circle mr-1'></i> XONG </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    @endif
    @if($statusMoveTable)
        <div class="modal fade" wire:ignore.self id="move-table" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full-width">
                <form method="GET" wire:submit.prevent=''>
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Chuyển bàn</h4>
                            <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class='row bg-primary'>
                                <div class='col-12 border-bottom border-primary rounded text-center'>
                                    <h4 class="text-light ">Chọn bàn chuyển đến</h4>
                                </div>
                            </div>
                            <div class="row" id='content'>
                                @if(!empty($table_move))
                                    <?php $dem = 0; ?>
                                    @foreach($table_move as $value)
                                        <div class="col-3" style="z-index:0">
                                            <div class="widget-rounded-circle card">
                                                <div class="card-body">
                                                    <div class="text-end">
                                                        <input type="radio" wire:model='table_move_to_id' value="{{ $value->id }}">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="avatar-lg rounded-circle bg-danger w-100 h-100">
                                                                <i style="font-size:large;" class="fe-card avatar-title text-light text-center">{{ $value->table_name }}</i>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div>
                                                                @if($value->status == 0)
                                                                    <img src='{{ asset("image/table_empty.png") }}' class="w-75">
                                                                    <p class="text-muted mb-1 text-truncate">Trống</p>
                                                                @else
                                                                    <img src='{{ asset("image/table_4.png") }}' class="w-75">
                                                                    <p class="text-muted mb-1 text-truncate">Có người</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row-->
                                                </div>
                                            </div> <!-- end widget-rounded-circle-->
                                        </div> <!-- end col-->
                                        <?php $dem++; ?>
                                    @endforeach
                                    @if($dem == 0)
                                        <div class="row">
                                            <div class='col-12 text-center'>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class='text-danger'>CHƯA CÓ BÀN <i data-feather="alert-octagon" class="icon-dual-danger"></i></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div style="z-index:0">
                                        {{ $table_move->links() }}
                                    </div>
                                @endif
                            </div> <!-- container -->
                        </div>
                        <div class="modal-footer">
                            <button wire:click='moveTable' data-bs-dismiss="modal" style='padding-left: 30px;padding-right: 30px;' class="btn btn-success"><i class='fa fa-check-circle mr-1'></i> Chuyển bàn </button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
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
                            <button wire:click='print({{ $ID }}, "{{ $user }}", "{{ $table_in }}", "{{ $area_in }}", "{{ $total }}", "{{ $percen }}")' style=' margin-bottom:10px;' class="btn btn-secondary btn-rounded waves-effect waves-light">
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
            window.addEventListener('show-order', event => {
                $('#order').modal('show');
            })
        </script>
        <script>
            window.addEventListener('show-move-table', event => {
                $('#move-table').modal('show');
            })
        </script>
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