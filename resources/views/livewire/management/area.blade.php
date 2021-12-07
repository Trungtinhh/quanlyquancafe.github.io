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
                            <li class="breadcrumb-item active">Quản lý khu vực</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý khu vực</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary">
                                    <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Tổng số</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        @canany(['system.permission.management'])
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

            <button data-bs-target="#create-area" data-bs-toggle="modal" wire:click='closeAdd' style='margin-bottom:10px;' class="btn btn-primary btn-rounded waves-effect waves-light">
                THÊM KHU VỰC
            </button>
        </div>
        @endcanany
        <div class="row">
            @if(!empty($area))
            @foreach($area as $are)
            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                @canany(['system.permission.management'])
                                <a wire:click='addTable({{ $are->id }})' class="dropdown-item">Thêm bàn</a>
                                @endcanany
                                <a wire:click='detailArea({{ $are->id }})' class="dropdown-item">Chi tiết</a>
                                @canany(['system.permission.management'])
                                <a wire:click='deleteArea({{ $are->id }})' class="dropdown-item">Xóa khu vực</a>
                                @endcanany
                            </div>
                        </div>
                        <h4 class="header-title mb-4">{{ $are->sub_name }}</h4>
                        <div class='text-center border'><img src='{{ asset("image/multi_table.jpg") }}' width="120px;"></div>
                        <div class="row text-center mt-2 border">
                            <?php
                            $empty = 0;
                            $notEmpty = 0;
                            ?>
                            @if(!empty($table))
                            @foreach($table as $value)
                            @if($value->sub_id == $are->id)
                            @if($value->status == 0)
                            <?php
                            $empty++;
                            ?>
                            @else
                            <?php
                            $notEmpty++;
                            ?>
                            @endif
                            @endif
                            @endforeach
                            @endif
                            <div class="col-md-4">
                                <h3 class="fw-normal mt-3">
                                    <span>{{ $empty + $notEmpty}}</span>
                                </h3>
                                <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Tổng số </p>
                            </div>
                            <div class="col-md-4">
                                <h3 class="fw-normal mt-3">
                                    <span>{{ $notEmpty }}</span>
                                </h3>
                                <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Có người</p>
                            </div>
                            <div class="col-md-4">
                                <h3 class="fw-normal mt-3">
                                    <span>{{ $empty }}</span>
                                </h3>
                                <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Còn trống </p>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card-->
            </div>
            @endforeach
            @endif
            <!-- end col -->
        </div>
        <div class="modal fade" wire:ignore.self id="create-area" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="GET" wire:submit.prevent='addArea'>
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Thêm khu vực</h4>
                            <button type="button" wire:click='closeAdd' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card border-primary border mb-3">
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <h4 class="header-title">Tên khu vực:</h4>
                                                        <br />
                                                        <div class="mb-3 row">
                                                            <div class="col-sm-10">
                                                                <input wire:model.lazy='area_name' type="text" class="form-control" value="">
                                                                @error('area_name')
                                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                    {{ $message}}
                                                                </div>
                                                                @enderror
                                                                @if(!empty($noti))
                                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                    {{ $noti }}
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <br />
                                                    <br />
                                                </div>
                                                <div class='row'>
                                                    <div class="col-lg-12">
                                                        <?php $dem = 0; ?>
                                                        <table width='100%'>
                                                            <thead>
                                                                <tr>
                                                                    <th width='100%'>Chọn bàn:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check form-check-inline mb-2 form-check-primary" style="margin: 20px;">
                                                                            <input class="form-check-input" wire:model.lazy='table_id' type="checkbox" value="{{ -1 }}">
                                                                            <label class="form-check-label" for="customckeck7">Không chọn bàn</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th width='100%' class="border">
                                                                        @if(!empty($table))
                                                                        @foreach($table as $value)
                                                                        @if(empty($value->sub_id))
                                                                        <div class="form-check form-check-inline mb-2 form-check-danger" style="margin: 20px;">
                                                                            <input class="form-check-input" wire:model.lazy='table_id' type="checkbox" value="{{ $value->id }}" checked>
                                                                            <label class="form-check-label" for="customckeck7">{{ $value->table_name }}</label>
                                                                        </div>
                                                                        <?php $dem++; ?>
                                                                        @endif
                                                                        @endforeach
                                                                        @if($dem == 0)
                                                                        <div style="margin: 10px;">
                                                                            <h6 class="text-danger"> <i data-feather="alert-triangle" class="icon-dual-danger"></i>Tất cả các bàn đã được xếp vào các khu vực khác</h6>
                                                                            <input class="form-check-input" wire:model.lazy='table_id' type="checkbox" value="{{ -1 }}">
                                                                            <label class="form-check-label" for="customckeck7">Bỏ qua</label>
                                                                        </div>
                                                                        @endif
                                                                        @endif
                                                                    </th>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        @error('table_id')
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            {{ $message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button wire:click='closeAdd' type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                            <button wire:click='closeAdd' style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" wire:ignore.self id="add-table" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="GET" wire:submit.prevent='storeTable'>
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Thêm bàn vào khu vực : </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card border-primary border mb-3">
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class='row'>
                                                    <div class="col-lg-12">
                                                        <?php $dem = 0; ?>
                                                        <table width='100%'>
                                                            <thead>
                                                                <tr>
                                                                    <th width='100%'>Chọn bàn:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th width='100%' class="border">
                                                                        @if(!empty($table))
                                                                        @foreach($table as $value)
                                                                        @if(empty($value->sub_id))
                                                                        <div class="form-check form-check-inline mb-2 form-check-danger" style="margin: 20px;">
                                                                            <input class="form-check-input" wire:model.lazy='table_id' type="checkbox" value="{{ $value->id }}" checked>
                                                                            <label class="form-check-label" for="customckeck7">{{ $value->table_name }}</label>
                                                                        </div>
                                                                        <?php $dem++; ?>
                                                                        @endif
                                                                        @endforeach
                                                                        @if($dem == 0)
                                                                        <div style="margin: 10px;">
                                                                            <h6 class="text-danger"> <i data-feather="alert-triangle" class="icon-dual-danger"></i>Tất cả các bàn đã được xếp vào các khu vực khác</h6>
                                                                        </div>
                                                                        @endif
                                                                        @endif
                                                                    </th>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        @if($dem != 0)
                                                        @if(!empty($noti))
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            {{ $noti }}
                                                        </div>
                                                        @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                            <button style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" wire:ignore.self id="detail-area" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full-width">
                <form method="GET" wire:submit.prevent=''>
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="fullWidthModalLabel">Danh sách bàn</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card border-primary border mb-3">
                                <div class="row" style="margin: 20px;">
                                    @if(!empty($table))
                                    <?php $dem = 0; ?>
                                    @foreach($table as $value)
                                    @if($value->sub_id == $sub_id)
                                    <div class="col-3">
                                        <div class="widget-rounded-circle card">
                                            <div class="card-body bg-soft-warning">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="avatar-lg rounded-circle bg-soft-danger">
                                                            <i class="fe-card font-22 avatar-title text-secondary">{{ $value->table_name }}</i>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
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
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
    <script>
        window.addEventListener('show-add-table', event => {
            $('#add-table').modal('show');
        })
    </script>
    <script>
        window.addEventListener('show-detail-area', event => {
            $('#detail-area').modal('show');
        })
    </script>
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