<div>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Quản lý bàn và khu vực</a></li>
                            <li class="breadcrumb-item active">Bàn trống</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Bàn trống</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary">
                                    <i class="fe-shopping-cart font-22 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Tổng số bàn</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-9">
                <div class="row">
                    <div class="col-4">

                    </div>
                    <div class="col-8">
                        <form class="search-bar p-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Tìm tên bàn...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($area))
        @foreach($area as $a)
        <div class='row'>
            <div class='col-12 border-bottom border-primary rounded'>
                <h5>{{ $a->sub_name }}</h5>
            </div>
        </div>
        <br>
        <div class="row" id='content'>
            @if(!empty($table))
            <?php $dem = 0; ?>
            @foreach($table as $value)
            @if($value->sub_id == $a->id)
            <div class="col-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body bg-soft-warning">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-danger">
                                    <i class="fe-card font-22 avatar-title text-light">{{ $value->table_name }}</i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @if($value->status == 0)
                                        <a class="dropdown-item" href="#">Gọi món</a>
                                        @else
                                        <a class="dropdown-item" href="#">Thêm món</a>
                                        <a class="dropdown-item" href="#">Chuyển bàn</a>
                                        <a class="dropdown-item" href="#">Chi tiết</a>
                                        <a class="dropdown-item" href="#">Thanh toán</a>
                                        @endif
                                    </div>
                                </div> <!-- end dropdown -->
                                <div>
                                    @if($value->status == 0)
                                    <img src='{{ asset("image/table_empty.png") }}' width="60px;">
                                    <p class="text-muted mb-1 text-truncate">Trống</p>
                                    @else
                                    <img src='{{ asset("image/table_4.png") }}' width="60px;">
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
                <div class='col-4 text-center'>
                    <div class="card">
                        <div class="card-body">
                            <h4 class='text-danger'>CHƯA CÓ BÀN <i data-feather="alert-octagon" class="icon-dual-danger"></i></h4>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endif
        </div> <!-- container -->
        @endforeach
        @endif
    </div>
    @section('script')
    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#content div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    @endsection
</div>