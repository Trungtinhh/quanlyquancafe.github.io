<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Quán cafe</li>
                        <li class="breadcrumb-item active">Quản lý kho</li>
                        <li class="breadcrumb-item active">Nhập hàng</li>
                    </ol>
                </div>
                <h4 class="page-title">Nhập hàng </h4>
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
                            <div class="avatar-lg rounded-circle bg-warning">
                                <i class="fe-tag font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-home">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"></span></h3>
                                <p class="text-muted mb-1 text-truncate">Tổng số mặt hàng</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button data-bs-target="#add-product" data-bs-toggle="modal" wire:click='' style='margin-bottom:10px;' class="btn btn-danger btn-rounded waves-effect waves-light">
                                    NHẬP KHO
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#drinks" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Thức uống
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#ingredents" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                                Nguyên liệu
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="drinks">
                                            <div class='col-3'>
                                                <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>ID</th>
                                                            <th>Tên</th>
                                                            <th>Số lượng</th>
                                                            <th>Ngày thêm</th>
                                                            <th>Hành động</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id='content'>
                                                        @if(!empty($drink))
                                                        @foreach($drink as $value)
                                                        <tr>
                                                            <th scope="row">{{ ++$loop->value }}</th>
                                                            <th scope="row"><span class="badge bg-success">{{ $value->drink->drink_id }}</span></th>
                                                            <th scope="row">{{ $value->drink->drink_name }}</th>
                                                            <td scope="row"><span class="bg-soft-danger text-danger">{{ $value->amount_add }}</span>
                                                            <th scope="row">{{ $value->date_add }}</th>
                                                            <td scope="row">
                                                                <button wire:click="" class="btn btn-success btn-rounded waves-effect waves-light">
                                                                    <i class="mdi mdi-check" title='Chấp nhận'></i>
                                                                </button>
                                                                <button wire:click="" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                                    <i class="mdi mdi-delete" title='Xóa'></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <div class="page-title-box">

                                                    <h6 class="page-title" style="text-align: center;">Không có tài khoản mới!</h6>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane " id="ingredents">
                                            <div class='col-3'>
                                                <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>ID</th>
                                                            <th>Tên</th>
                                                            <th>Số lượng</th>
                                                            <th>Ngày thêm</th>
                                                            <th>Hành động</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id='content'>
                                                        @if(!empty($ingredent))
                                                        @foreach($ingredent as $value)
                                                        <tr>
                                                            <th scope="row">{{ ++$loop->index }}</th>
                                                            <th scope="row"><span class="badge bg-success">{{ $value->drink->drink_id }}</span></th>
                                                            <th scope="row">{{ $value->drink->drink_name }}</th>
                                                            <td scope="row"><span class="bg-soft-danger text-danger">{{ $value->amount_add }}</span>
                                                            <th scope="row">{{ $value->date_add }}</th>
                                                            <td scope="row">
                                                                <button wire:click="" class="btn btn-success btn-rounded waves-effect waves-light">
                                                                    <i class="mdi mdi-check" title='Chấp nhận'></i>
                                                                </button>
                                                                <button wire:click="" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                                    <i class="mdi mdi-delete" title='Xóa'></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <div class="page-title-box">

                                                    <h6 class="page-title" style="text-align: center;">Không có tài khoản mới!</h6>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>

                </div>
            </div>
        </div><!-- end col -->
    </div>
    <div class="modal fade" wire:ignore.self id="add-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="GET" wire:submit.prevent='addShift'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Thêm ca làm</h4>
                        <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <div class="col-sm-2">
                                            <label class="form-label" autocomplete="off">Danh mục </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control bg-soft-warning" wire:model.lazy='category'>
                                                <option value="">Chọn</option>
                                                <option value="{{1}}">Thức uống</option>
                                                <option value="{{2}}">Nguyên liệu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="form-label" autocomplete="off">Tên</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" wire:model.lazy='product_name'>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="form-label" autocomplete="off">Số lượng</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" wire:model.lazy='amount_add'>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="form-label" autocomplete="off">Hạn dùng</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" wire:model.lazy='date_exp'>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="form-label" autocomplete="off">Nhà cung cấp</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" wire:model.lazy='product_name'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click='' type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button wire:click='' style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- end row -->
    @section('script')
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