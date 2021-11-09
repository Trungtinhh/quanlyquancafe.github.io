<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Quản lý nhân sự</a></li>
                        <li class="breadcrumb-item active">Quản lý ca làm </li>
                    </ol>
                </div>
                <h4 class="page-title">Quản lý ca làm </h4>
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
                            <div class="avatar-lg rounded-circle bg-danger">
                                <i class="fe-tag font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-home">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Tổng số</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                <button data-bs-target="#create-shift" data-bs-toggle="modal" wire:click='closeAdd' style='margin-bottom:10px;' class="btn btn-primary btn-rounded waves-effect waves-light">
                    THÊM CA
                </button>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Quản lý ca làm</h4>
                    <div class='col-3'>
                        <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ca làm</th>
                                    <th>Bắt đầu</th>
                                    <th>Kết thúc</th>
                                    <th>Màu đại diện</th>
                                    <th class='text-center'>Hành động</th>
                                </tr>
                            </thead>

                            <tbody id='content'>
                                <?php $temp = 0; ?>
                                @if(!empty($shift))
                                @foreach ($shift as $value)
                                <tr>
                                    <td scope="row">{{++$loop->index}}</td>
                                    <td scope="row"> <span class="badge bg-primary ">{{$value->name}}</span></td>
                                    <td scope="row">{{$value->time_start}}</td>
                                    <td scope="row">{{$value->time_end}}</td>
                                    <td scope="row">
                                        <div class="avatar-sm rounded-circle {{$value->color}}">
                                        </div>
                                    </td>
                                    <td scope="row" class='text-center'>
                                        <button wire:click="editShift({{ $value }})" class="btn btn-soft-success btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-file-edit" title='Sửa'></i>
                                        </button>
                                        <button wire:click="deleteShift({{ $value->id }})" class="btn btn-soft-danger btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-delete" title='Xóa'></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                $temp++; ?>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="page-title-box">
                            @if($temp == 0)
                            <h6 class="page-title" style="text-align: center;">trống!</h6>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
    <div class="modal fade" wire:ignore.self id="create-shift" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="GET" wire:submit.prevent='addShift'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Thêm ca làm</h4>
                        <button type="button" wire:click='closeAdd' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card border-primary border mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        @if ($errors->any())
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        @if(!empty($noti))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <ul>
                                                <li>{{ $noti }}</li>
                                            </ul>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h4 class="header-title">Tên ca:</h4>
                                                    <br />
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <input wire:model.lazy='shift_name' type="text" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <br />
                                                <br />
                                                <br />
                                            </div>
                                            <div class='row'>
                                                <div class="col-lg-4">
                                                    <h4 class="header-title">Thời gian làm: </h4>
                                                </div>
                                            </div>
                                            <br>

                                            <div class='row'>
                                                <div class="col-lg-4">
                                                    <span class="header-title">Bắt đầu lúc: </span>
                                                    <input type="time" wire:model.lazy='time_start' class="form-control">
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="header-title">Kết thúc lúc: </span>
                                                    <input type="time" wire:model.lazy='time_end' class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <div class='row'>
                                                <div class="col-lg-4">
                                                    <label for="example-color" class="form-label">Màu đại diện:</label>
                                                    <select class="form-select" wire:model.lazy='color' required>
                                                        <option>Chọn màu</option>
                                                        <option value="bg-danger">Đỏ</option>
                                                        <option value="bg-success">Xanh lá </option>
                                                        <option value="bg-primary">Xanh dương</option>
                                                        <option value="bg-info">Xanh nhạt</option>
                                                        <option value="bg-dark">Đen</option>
                                                        <option value="bg-warning">Vàng</option>
                                                    </select>
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
    @if($shift_edit)
    <div class="modal fade" wire:ignore.self id="edit-shift" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="GET" wire:submit.prevent='storeEditShift'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Sửa ca làm</h4>
                        <button type="button" wire:click='closeEdit' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card border-primary border mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        @if ($errors->any())
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h4 class="header-title">Tên ca:</h4>
                                                    <br />
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <input wire:model.lazy='shift_name' type="text" placeholder="{{ $shift_edit['name'] }}" class="form-control" value="">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <br />
                                                <br />
                                                <br />
                                            </div>
                                            <div class='row'>
                                                <div class="col-lg-4">
                                                    <h4 class="header-title">Thời gian làm: </h4>
                                                </div>
                                            </div>
                                            <br>

                                            <div class='row'>
                                                <div class="col-lg-4">
                                                    <span class="header-title">Bắt đầu lúc: </span>
                                                    <input type="time" wire:model.lazy='time_start' class="form-control">
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="header-title">Kết thúc lúc: </span>
                                                    <input type="time" wire:model.lazy='time_end' class="form-control">
                                                </div>
                                                <br>
                                                <div class='row'>
                                                    <div class="col-lg-4">
                                                        <label for="example-color" class="form-label">Màu đại diện:</label>
                                                        <select class="form-select" wire:model.lazy='color' required>
                                                            <option>Chọn màu</option>
                                                            <option value="bg-danger">Đỏ</option>
                                                            <option value="bg-success">Xanh lá </option>
                                                            <option value="bg-primary">Xanh dương</option>
                                                            <option value="bg-info">Xanh nhạt</option>
                                                            <option value="bg-dark">Đen</option>
                                                            <option value="bg-warning">Vàng</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click='closeEdit' type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button style='padding-left: 30px;padding-right: 30px;' class="btn btn-success" type="submit"><i class="mdi mdi-file-edit"></i> Cập nhật </button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endif
    @section('script')
    <script>
        window.addEventListener('show-edit', event => {
            $('#edit-shift').modal('show');
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#content tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <!-- Toastr js-->
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