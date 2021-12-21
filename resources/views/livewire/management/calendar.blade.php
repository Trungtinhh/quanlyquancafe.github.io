<div>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">quán coffee</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quản lý nhân sự</a></li>
                            <li class="breadcrumb-item active">Lịch làm việc</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Lịch làm việc</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                @canany(['system.permission.management'])
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button wire:click='closeAdd' data-bs-target="#create-calendar" data-bs-toggle="modal" style='margin-bottom:10px;' class="btn btn-primary btn-rounded waves-effect waves-light">
                            Sắp lịch làm
                        </button>
                    </div>
                @endcanany
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <h4 class="header-title">Ca làm:</h4>
                                @foreach($shift as $value)
                                    <div class="external-event {{ $value->color }}" data-class="{{ $value->color }}">
                                        <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>{{ $value->name .': '.$value->time_start.'-'.$value->time_end }}
                                    </div>
                                @endforeach

                            </div> <!-- end col-->

                            <div class="col-lg-9">
                                <h4 class="header-title">Lịch làm hôm nay: {{ now('Asia/Ho_Chi_Minh')->toDateString() }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class='table-dark'>
                                            <tr>
                                                <th width='10%'>STT</th>
                                                <th width='20%' class='text-center '>Ca làm</th>
                                                <th class='text-center'>Nhân viên</th>
                                                @canany(['system.permission.management'])
                                                    <th width='14%' class='text-center'>Hành động</th>
                                                @endcanany
                                            </tr>
                                        </thead>
                                        <?php $date_delete = '';
                                        $shift_delete = '';
                                        ?>
                                        <tbody>
                                            @foreach($shift as $value)
                                                <tr>
                                                    <td scope="row" class='text-center align-middle'>{{ ++$loop->index }}</td>
                                                    <th class='text-center align-middle'>{{ $value->name }}</th>
                                                    <td scope="row" class=' align-middle'>
                                                        <ul>
                                                            @foreach($calendar as $cal)
                                                                @if($cal->shift_id == $value->id)
                                                                    <li>{{ $cal->user->name }}</li>
                                                                    <?php 
                                                                        $date_delete = $cal->date;
                                                                        $shift_delete = $value->id; 
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    @canany(['system.permission.management'])
                                                        <td scope="row" class='text-center align-middle'>
                                                            @if($date_delete != '' && $date_delete != '')
                                                                <button title='Đặt lại' wire:click="deleteCalendar('{{ $date_delete }}', {{ $shift_delete }})" class="btn btn-soft-primary btn-rounded waves-effect waves-light">
                                                                    <i class="mdi mdi-file"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    @endcanany
                                                </tr>
                                                <?php $date_delete = '';
                                                $shift_delete = '';
                                                ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->

                        </div> <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->


                <div class="modal fade" wire:ignore.self id="create-calendar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="GET" wire:submit.prevent='addCalendar'>
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Sắp lịch làm việc</h4>
                                    <button type="button" wire:click='closeAdd' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card border-primary border mb-3">
                                        <div class="card-body">
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
                                            <div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Ngày làm: </label>
                                                            <input class="form-control" wire:model.lazy='date_work' type="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Ca làm</label>
                                                            <select class="form-select" wire:model.lazy='shift_work' required>
                                                                <option>Chọn ca...</option>
                                                                @foreach($shift as $value)
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Người làm: </label>
                                                            <div class="row">
                                                                @foreach($user as $u)
                                                                    <div class="col-3">
                                                                        <div class="form-check mb-2 form-check-warning">
                                                                            <input class="form-check-input" wire:model.lazy='user_work' type="checkbox" value="{{ $u->id }}" id="customckeck7">
                                                                            <label class="form-check-label" for="customckeck7">{{ $u->name }}</label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click='closeAdd' class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                                    <button style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </form>
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- Add New Event MODAL -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @canany(['system.permission.management'])
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button wire:click='deleteAllCalendar' style='margin-bottom:10px;' class="btn btn-danger btn-rounded waves-effect waves-light">
                                        Đặt lại tất cả
                                    </button>
                                </div>
                            @endcanany
                            <div class="col-lg-12">
                                <h4 class="header-title">Lịch làm trong 7 ngày gần đây: </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class='table-dark'>
                                            <tr>
                                                <th class='text-center align-middle'>Ca làm</th>
                                                @foreach($week as $w => $value)
                                                    <th class='text-center align-middle'>{{ $w }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <?php $date_delete = '';
                                        $shift_delete = '';
                                        ?>
                                        <tbody>
                                            @foreach($shift as $value)
                                                <tr>
                                                    <th class='text-center align-middle'>{{ $value->name }}</th>
                                                    @foreach($week as $w => $temp)
                                                        <td scope="row">
                                                            <div class='row'>
                                                            <div class="col-8">
                                                                    <ul>
                                                                        @foreach($dayOfWeek as $cal => $val)
                                                                            @foreach($val as $a)
                                                                                @if($a['shift_id'] == $value->id && $a['date'] == $w)
                                                                                    <li>{{ $a['user']->name }}</li>
                                                                                    <?php 
                                                                                        $date_delete = $a['date'];
                                                                                        $shift_delete = $a['shift_id']; 
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="col-3">
                                                                    @canany(['system.permission.management'])
                                                                        @if($date_delete != '' && $shift_delete != '')
                                                                        <button title='Đặt lại' wire:click="deleteCalendar('{{ $date_delete }}', {{ $shift_delete }})" class="btn btn-soft-primary btn-rounded waves-effect waves-light">
                                                                            <i class="mdi mdi-file"></i>
                                                                        </button>
                                                                        @endif
                                                                    @endcanany
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <?php 
                                                            $date_delete = '';
                                                            $shift_delete = '';
                                                        ?>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->

                        </div> <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="header-title">Tất cả lịch làm việc </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class='table-dark'>
                                            <tr>
                                                <th class='text-center align-middle'>Ngày</th>
                                                @foreach($shift as $value)
                                                    <th class='text-center align-middle'>{{ $value->name }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <?php $date_delete = '';
                                        $shift_delete = '' ?>
                                        <tbody>
                                            @foreach($week as $w => $value)
                                            <tr>
                                                <th class='text-center align-middle'>{{ $w }}</th>
                                                @foreach($shift as $value)
                                                <td scope="row">                                                   
                                                    <ul>
                                                        @foreach($fullCalendar as $cal => $val)
                                                            @foreach($val as $a)
                                                                @if($a['shift_id'] == $value->id && $a['date'] == $w)
                                                                    <li>{{ $a['user']->name }}</li>
                                                                    <?php $date_delete = $a['date'];
                                                                    $shift_delete = $a['shift_id']; ?>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </ul>                                                   
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->

                        </div> <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div> <!-- container -->

        </div> <!-- content -->

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