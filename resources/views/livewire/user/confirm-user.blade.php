<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Quán cafe</li>
                        <li class="breadcrumb-item active">Quản lý người dùng</li>
                        <li class="breadcrumb-item active">Người dùng mới</li>
                    </ol>
                </div>
                <h4 class="page-title">Người dùng mới </h4>
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
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$new}}</span></h3>
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
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Quản lý người dùng mới</h4>
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
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody id='content'>
                                <?php $temp = 0; ?>
                                @if(!empty($link))
                                    <?php $dem = 1; ?>
                                    @foreach ($link as $user)
                                        <tr>
                                            <th scope="row">{{$dem++}}</th>
                                            <th scope="row"> <span class="badge bg-success">{{$user->id}}</span></th>
                                            <th scope="row">{{$user->name}}</th>
                                            <td scope="row">{{$user->email}}</td>
                                            <td scope="row"><span class="badge bg-soft-danger text-danger">Chờ xác nhận</span></td>
                                            <td scope="row">
                                                <button wire:click="confirmUser({{ $user->id }})" class="btn btn-success btn-rounded waves-effect waves-light">
                                                    <i class="mdi mdi-check" title='Chấp nhận'></i>
                                                </button>
                                                <button wire:click="refuseUser({{ $user->id }})" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                    <i class="mdi mdi-delete" title='Xóa'></i>
                                                </button>
                                            </td>
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
                        {{$link->links()}}
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