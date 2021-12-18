<div>

    <div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Quản lý nhân sự</a></li>
                            <li class="breadcrumb-item active">Quản lý chấm công </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý chấm công </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="avatar-lg rounded-circle bg-warning">
                                    <i class="fe-tag font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-home">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count_tkp + $count_edit }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Chưa xác nhận</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="avatar-lg rounded-circle bg-primary">
                                    <i class="fe-tag font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-home">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count_tkp }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Mới</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="avatar-lg rounded-circle bg-success">
                                    <i class="fe-tag font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-home">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count_edit }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Đã sửa</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Chấm công chưa xác nhận</h4>
                        <div class='col-3'>
                            <input class="form-control" id="search1" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Bắt đầu</th>
                                        <th>Kết thúc</th>
                                        <th>Tổng thời gian</th>
                                        <th>Trạng thái</th>
                                        <th class='text-center'>Hành động</th>
                                    </tr>
                                </thead>
                                <?php $temp = 0; ?>
                                <tbody id='content1'>
                                    @foreach($confirmTKP as $value)
                                    <tr>
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        <td scope="row">{{ $value->user->name }}</td>
                                        <td scope="row">{{ $value->time_start }}</td>
                                        <td scope="row">{{ $value->time_end }}</td>
                                        <td scope="row"><span class="badge  text-primary"></span>{{ $value->hour }} phút</td>
                                        <td scope="row"> <span class="badge bg-warning">Chờ xác nhận</span></td>
                                        <td scope="row" class='text-center'>
                                            <button wire:click="confirm({{ $value->id }})" class="btn btn-soft-primary btn-rounded waves-effect waves-light">
                                                <i class="mdi mdi-check-circle" title='Xác nhận'></i>
                                            </button>
                                            <button wire:click="delete({{ $value->id }})" class="btn btn-soft-danger btn-rounded waves-effect waves-light">
                                                <i class="mdi mdi-delete" title='Xóa'></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $temp++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($temp == 0)
                        <div>
                            <h5 class="bg-light d-block-flex p-2 text-center">Trống!</h5>
                        </div>
                        @endif
                        {{ $confirmTKP->links() }}
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Sửa chấm công chưa xác nhận</h4>
                        <div class='col-3'>
                            <input class="form-control" id="search2" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Bắt đầu</th>
                                        <th>Kết thúc</th>
                                        <th>Tổng thời gian</th>
                                        <th>Trạng thái</th>
                                        <th class='text-center'>Hành động</th>
                                    </tr>
                                </thead>
                                <?php $temp = 0; ?>
                                <tbody id='content2'>
                                    @foreach($confirmEdit as $value)
                                    <tr>
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        <td scope="row">{{ $value->user->name }}</td>
                                        <td scope="row">{{ $value->time_start }}</td>
                                        <td scope="row">{{ $value->time_end }}</td>
                                        <td scope="row"><span class="badge  text-primary"></span>{{ $value->hour }} phút</td>
                                        <td scope="row"> <span class="badge bg-warning">Chờ xác nhận</span></td>
                                        <td scope="row" class='text-center'>
                                            <button wire:click="confirmEdit({{ $value->id }})" class="btn btn-soft-primary btn-rounded waves-effect waves-light">
                                                <i class="mdi mdi-check-circle" title='Xác nhận'></i>
                                            </button>
                                            <button wire:click="delete({{ $value->id }})" class="btn btn-soft-danger btn-rounded waves-effect waves-light">
                                                <i class="mdi mdi-delete" title='Xóa'></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $temp++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                            @if($temp == 0)
                            <div>
                                <h5 class="bg-light d-block-flex p-2 text-center">Trống!</h5>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Quản lý chấm công</h4>
                        <div class='col-3'>
                            <input class="form-control" id="search3" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th class='text-center'>Hành động</th>
                                    </tr>
                                </thead>
                                <?php $temp = 0; ?>
                                <tbody id="content3">
                                    @foreach($user as $value)
                                    <tr>
                                        <th scope="row">{{ ++$loop->index }}</th>
                                        <th scope="row"> <span class="badge bg-warning">{{ $value->id }}</span></th>
                                        <th scope="row">{{ $value->name }}</th>
                                        <th scope="row">{{ $value->email }}</th>
                                        <th scope="row" class='text-center'>
                                            <button wire:click="detail({{ $value->id }})" class="btn btn-outline-success btn-rounded waves-effect waves-light">
                                                <i class="mdi mdi-eye" title='Xem'></i>
                                            </button>
                                        </th>
                                    </tr>
                                    <?php $temp++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        @if($statusView)
                        <!-- Large modal -->
                        <div class="modal fade" wire:ignore.self id="detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Danh sách chấm công</h4>
                                        <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class='col-3'>
                                                                <div>
                                                                    <span>Giờ làm trong tháng: (giờ)</span>
                                                                    <input class="form-control" type="text" wire:model='hour_wage' readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-5">
                                                                <form wire:submit.prevent='wage'>
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-7">
                                                                            <span for="">Nhập lương:(tiền/giờ)</span>
                                                                            <input wire:model.lazy='wage_money' class="form-control" type="number" min='0'>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <br>
                                                                            <button type='submit' class="btn btn-primary">Tính lương</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <span for=""><i class="fe-dollar-sign"></i>Lương:(VND)</span>
                                                                <input wire:model='wage' class="form-control" type="text" readonly name="" id="">
                                                            </div>
                                                            <div class="col-3">
                                                                <br>
                                                                <button wire:click='undoWage' class="btn btn-secondary">Tính lại</button>
                                                                <button wire:click='insertWage' class="btn btn-success">Lưu lại</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-7"></div>
                                                            <div class="col-5">
                                                                <span>Tìm kiếm:</span>
                                                                <input class="form-control" id="search" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Bắt đầu</th>
                                                                    <th>Kết thúc</th>
                                                                    <th>Tổng thời gian</th>
                                                                    <th>Trạng thái</th>
                                                                    <th class="text-center">Xác nhận</th>
                                                                </tr>
                                                            </thead>
                                                            <?php $temp = 0; ?>
                                                            <tbody id='content'>
                                                                @foreach($info_TKP as $value)
                                                                <tr>
                                                                    <td scope="row">{{ ++$loop->index }}</td>
                                                                    <td scope="row">{{ $value->time_start }}</td>
                                                                    @if($value->status == 1)
                                                                    <td scope="row">Chưa kết thúc</td>
                                                                    <td scope="row"><span class="badge  text-primary"></span>---</td>
                                                                    <td scope="row"> <span class="badge bg-warning">Đang điểm danh</span></td>
                                                                    <td scope="row" class="text-center"> <span class="badge bg-danger"></span>---</td>
                                                                    @else
                                                                    <td scope="row">{{ $value->time_end }}</td>
                                                                    <td scope="row"><span class="badge  text-primary"></span>{{ $value->hour }} phút</td>
                                                                    <td scope="row"> <span class="badge bg-success">Hoàn thành</span></td>
                                                                    @if($value->status_edit == 1 || $value->status == 2)
                                                                    <td scope="row" class="text-center"> <span class="badge bg-danger">Chờ xác nhận</span></td>
                                                                    @else
                                                                    <td scope="row" class="text-center"> <span class="badge bg-primary">Đã xác nhận</span></td>
                                                                    @endif
                                                                    @endif
                                                                </tr>
                                                                <?php $temp++; ?>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @if($temp == 0)
                                                        <div>
                                                            <h5 class="bg-light d-block-flex p-2 text-center">Trống!</h5>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button wire:click='' data-bs-dismiss="modal" style='padding-left: 30px;padding-right: 30px;' class="btn btn-secondary"><i class='fa fa-times-circle mr-1'></i> Đóng </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            @endif

            @if($temp == 0)
            <div>
                <h5 class="bg-light d-block-flex p-2 text-center">Trống!</h5>
            </div>
            @endif
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
<div class="modal fade" wire:ignore.self id="confirm-wage" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Bạn chắc chắn muốn lưu chứ ?
            </div>
            <div class="modal-footer">
                <button wire:click='insertWage' style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="button"> XÓA </button>
            </div>
        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
<script>
    window.addEventListener('show-detail', event => {
        $('#detail').modal('show');
    })
</script>
<script>
    $(document).ready(function() {
        $("#search1").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#content1 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#search2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#content2 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#search3").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#content3 tr").filter(function() {
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
</div>