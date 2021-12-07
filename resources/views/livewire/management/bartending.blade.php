<div>

    <div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Menu và pha chế</a></li>
                            <li class="breadcrumb-item active">Pha chế </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pha chế</h4>
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
                                <div class="avatar-lg rounded-circle bg-danger">
                                    <i class="fe-tag font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-home">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count_bar_no_complete }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Chưa làm</p>
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
                                <div class="avatar-lg rounded-circle bg-warning">
                                    <i class="fe-tag font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-home">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count_bar_doing }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Đang làm</p>
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
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count_bar_complete }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Đã làm</p>
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
                        <h4 class="header-title mb-4">Chưa làm</h4>
                        <div class='col-3'>
                            <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Bàn</th>
                                        <th>Khu vực</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        @canany(['system.configuration.management'])
                                        <th class='text-center'>Hành động</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    <?php $temp = 0; ?>
                                    @foreach($Bartending_no_complete as $bar)
                                    <tr>
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        <td scope="row">{{ $bar->drink->drink_name }}</td>
                                        <td scope="row">{{ $bar->table->table_name }}</td>
                                        <td scope="row">{{ $bar->table->area->sub_name }}</td>
                                        <td scope="row">{{ $bar->drink_amount }}<span class="badge  text-primary"></span></td>
                                        <td scope="row"> <span class="badge bg-danger">Chưa làm</span></td>
                                        @canany(['system.configuration.management'])
                                        <td scope="row" class='text-center'>
                                            <button wire:click="doing({{ $bar->id }})" class="btn btn-soft-primary btn-rounded waves-effect waves-light">
                                                <i class="mdi mdi-check-circle" title='Chế biến'></i>
                                            </button>
                                            <button wire:click="refuse({{ $bar->id }})" class="btn btn-soft-danger btn-rounded waves-effect waves-light">
                                                <i class="mdi mdi-close" title='Từ chối'></i>
                                            </button>
                                        </td>
                                        @endcanany
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
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Đang làm</h4>
                        <div class='col-3'>
                            <input class="form-control" id="search1" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Bàn</th>
                                        <th>Khu vực</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        @canany(['system.configuration.management'])
                                        <th class='text-center'>Hành động</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody id='content1'>
                                    <?php $temp = 0; ?>
                                    @foreach($Bartending_doing as $bar)
                                    <tr>
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        <td scope="row">{{ $bar->drink->drink_name }}</td>
                                        <td scope="row">{{ $bar->table->table_name }}</td>
                                        <td scope="row">{{ $bar->table->area->sub_name }}</td>
                                        <td scope="row">{{ $bar->drink_amount }}<span class="badge  text-primary"></span></td>
                                        <td scope="row"> <span class="badge bg-warning">Đang làm</span></td>
                                        @canany(['system.configuration.management'])
                                        <td scope="row" class='text-center'>
                                            <button wire:click="success({{ $bar->id }})" class="btn btn-success btn-rounded waves-effect waves-light">
                                                Hoàn thành
                                            </button>
                                        </td>
                                        @endcanany
                                    </tr>
                                    <?php $temp++ ?>
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
                        <h4 class="header-title mb-4">Món đã hoàn thành</h4>
                        <div class='col-3'>
                            <input class="form-control" id="search2" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 " id="tickets-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th>Tên</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Bàn</th>
                                        <th class="text-center">Khu vực</th>
                                        <th class="text-center">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody id='content2'>
                                    <?php $temp = 0; ?>
                                    @foreach($Bartending_complete as $bar)
                                    <tr>
                                        <td scope="row" class="text-center">{{ ++$loop->index }}</td>
                                        <td scope="row">{{ $bar->drink->drink_name }}</td>
                                        <td scope="row">{{ $bar->table->table_name }}</td>
                                        <td scope="row">{{ $bar->table->area->sub_name }}</td>
                                        <td scope="row" class="text-center">{{ $bar->drink_amount }}<span class="badge  text-primary"></span></td>
                                        <td scope="row" class="text-center"> <span class="badge bg-success">Hoàn thành</span></td>
                                    </tr>
                                    <?php $temp++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                            @if($temp == 0)
                            <div>
                                <h5 class="bg-light d-block-flex p-2 text-center">Trống!</h5>
                            </div>
                            @endif
                        </div>
                        {{ $Bartending_complete->links() }}
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