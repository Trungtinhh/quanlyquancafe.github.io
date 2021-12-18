<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Quán cafe</li>
                        <li class="breadcrumb-item active">Quản lý nhân sự</li>
                        <li class="breadcrumb-item active">Lương</li>
                    </ol>
                </div>
                <h4 class="page-title">Lương </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Quản lý lương</h4>
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
                                    <th>Lương</th>
                                    <th>Ngày tính</th>
                                    <th>Số giờ làm</th>
                                </tr>
                            </thead>

                            <tbody id='content'>
                                <?php $temp = 0; ?>
                                @if(!empty($wage))
                                <?php $dem = 1; ?>
                                @foreach ($wage as $vl)
                                <tr>
                                    <th scope="row">{{$dem++}}</th>
                                    <th scope="row"> <span class="badge bg-success">{{$vl->id}}</span></th>
                                    <th scope="row">{{$vl->user->name}}</th>
                                    <td scope="row"><span class="badge bg-warning text-light">{{ $vl->wage }}</span> VND</td>
                                    <td scope="row"><span class="badge bg-soft-danger text-danger">{{ $vl->date }}</span></td>
                                    <td scope="row">{{$vl->user->timeKeeping->hour/60}}</td>
                                </tr>
                                <?php
                                $temp++;
                                ?>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="page-title-box">
                            @if($temp == 0)
                            <h6 class="page-title" style="text-align: center;">Không có tài khoản mới!</h6>
                            @endif
                        </div>
                        {{$wage->links()}}
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
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