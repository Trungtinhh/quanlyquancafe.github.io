<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Quản lý nhân sự</a></li>
                        <li class="breadcrumb-item active">Chấm công </li>
                    </ol>
                </div>
                <h4 class="page-title">Chấm công </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

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
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Tổng số chấm công</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>

    <div class='row'>
        <div class='col-lg-12'>
            <div class='card'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-3'>
                            Chấm công hôm nay:
                        </div>
                        <div class='col-9'>

                            @if(!empty($temp))
                            <button class="btn btn-success btn-rounded waves-effect waves-light">
                                <i class="mdi mdi-alarm"> Đang bắt đầu </i>
                            </button>
                            <button class="btn btn-soft-warning btn-rounded waves-effect waves-light">
                                Đã làm được: {{ $hour->diffInMinutes(now('Asia/Ho_Chi_Minh')) }} phút
                            </button>
                            <button wire:click="end" class="btn btn-danger btn-rounded waves-effect waves-light">
                                <i class="mdi mdi-timer"> Kết thúc </i>
                            </button>
                            @else
                            <button wire:click="start" class="btn btn-success btn-rounded waves-effect waves-light">
                                <i class="mdi mdi-alarm-check"> Bắt đầu </i>
                            </button>
                            <button class="btn btn-soft-warning btn-rounded waves-effect waves-light">
                                Đã làm được: 0 phút
                            </button>
                            <button wire:click="" class="btn btn-danger btn-rounded waves-effect waves-light">
                                <i class="mdi mdi-timer"> Kết thúc </i>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Thống kê chấm công</h4>
                    <div class='col-3'>
                        <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
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
                                    <th class='text-center'>Hành động</th>
                                </tr>
                            </thead>
                            <?php $temp = 0; ?>
                            <tbody id='content'>
                                @foreach($tkp as $value)
                                <tr>
                                    <td scope="row">{{ ++$loop->index }}</td>
                                    <td scope="row">{{ $value->time_start }}</td>
                                    @if($value->status == 1)
                                    <td scope="row">Chưa kết thúc</td>
                                    <td scope="row"><span class="badge  text-primary"></span>{{ $hour->diffInMinutes(now('Asia/Ho_Chi_Minh')) }} phút</td>
                                    <td scope="row"> <span class="badge bg-warning">Đang điểm danh</span></td>
                                    <td scope="row" class="text-center"> <span class="badge bg-danger"></span>---</td>
                                    <td scope="row" class='text-center'>
                                        <button wire:click="delete({{ $value->id }})" class="btn btn-soft-danger btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-delete" title='Xóa'></i>
                                        </button>
                                    </td>
                                    @else
                                    <td scope="row">{{ $value->time_end }}</td>
                                    <td scope="row"><span class="badge  text-primary"></span>{{ $value->hour }} phút</td>
                                    <td scope="row"> <span class="badge bg-success">Hoàn thành</span></td>
                                    @if($value->status_edit == 1 || $value->status == 2)
                                    <td scope="row" class="text-center"> <span class="badge bg-danger">Chờ xác nhận</span></td>
                                    @else
                                    <td scope="row" class="text-center"> <span class="badge bg-primary">Đã xác nhận</span></td>
                                    @endif
                                    <td scope="row" class='text-center'>
                                        <button wire:click="edit({{ $value->id }})" class="btn btn-soft-primary btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-file-edit" title='Sửa'></i>
                                        </button>
                                        <button wire:click="delete({{ $value->id }})" class="btn btn-soft-danger btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-delete" title='Xóa'></i>
                                        </button>
                                    </td>
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
                        {{ $tkp->links() }}
                    </div>
                </div>
            </div>
            @if($statusEdit)
            <div class="modal fade" wire:ignore.self id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form class="permission" method="GET" wire:submit.prevent='storeEdit'>
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Sửa thời gian điểm danh</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <label class="form-label" autocomplete="off">Thời gian bắt đầu: </label>
                                            <input class="form-input" wire:model.lazy='time_start' type="dateTime-local" value="">
                                        </div>
                                        <br>
                                        <div>
                                            <label class="form-label" autocomplete="off">Thời gian kết thúc: </label>
                                            <input class="form-input" wire:model.lazy='time_end' type="dateTime-local" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button style='padding-left: 30px;padding-right: 30px;' class="btn btn-success" type="submit"> Cập nhật </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            @endif
        </div><!-- end col -->
    </div>
    @section('script')
    <script>
        window.addEventListener('show-edit', event => {
            $('#edit').modal('show');
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