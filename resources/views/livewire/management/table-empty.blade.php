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
                                <div class="avatar-lg rounded-circle bg-soft-danger">
                                    <i class="fe-shopping-cart font-22 avatar-title text-danger"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $count }}</span></h3>
                                    <button wire:click='allTableEmpty' class="btn btn-light waves-effect waves-light text-muted mb-1 text-truncate">Tất cả bàn trống</button>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-9">
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                        <form class="search-bar p-3" wire:submit.prevent=''>
                            <div class="position-relative" style="z-index:1">
                                <input type="text" wire:model='search' class="form-control" placeholder="Tìm tên bàn...">
                                <span class="mdi mdi-magnify"></span>
                                @if(!empty($search))
                                    @if(!empty($search_table))
                                        <div class="row">
                                            <div class="position-absolute">
                                                <ul class="list-group">
                                                    @foreach($search_table as $search =>$value)
                                                        <li wire:click='' class="list-group-item d-flex justify-content-between align-items-center">
                                                            {{ $value['table_name'] }}
                                                            <div class='text-end badge bg-primary rounded-pill'>{{ $value['status'] == 0 ? 'Trống': 'Có người'}}</div>
                                                            @canany(['system.permission.management'])
                                                                <div class='text-end rounded-pill'>
                                                                    <button wire:click="deleteTable({{ $value['id'] }})" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                                        <i class="mdi mdi-delete" title='Xóa'></i>
                                                                    </button>
                                                                </div>
                                                            @endcanany
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="list-item text-center">Không tìm thấy!</div>
                                    @endif
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($area))
            @foreach($area as $a)
                <div class='row text-end'>
                    <div class='col-12 border-bottom border-primary rounded '>
                        <h5 class="text-primary font-22">{{ $a->sub_name }}</h5>
                    </div>
                </div>
                <br>
                <div class="row" style="z-index:0">
                    @if(!empty($tableEmpty))
                        <?php $dem = 0; ?>
                        @foreach($tableEmpty as $value)
                            @if($value->sub_id == $a->id)
                                <div class="col-3">
                                    <div class="widget-rounded-circle card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="avatar-lg rounded-circle bg-danger w-100 h-100">
                                                        <i style="font-size:large;" class="fe-card avatar-title text-light text-center">{{ $value->table_name }}</i>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <img src='{{ asset("image/table_empty.png") }}' class="w-75">
                                                        <p class="text-muted mb-1 text-truncate">Trống</p>
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
                                <div class='col-12 text-center'>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class='text-danger'>HẾT BÀN <i data-feather="alert-triangle" class="icon-dual-warning"></i></h4>
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
    <div class="modal fade" wire:ignore.self id="all-table-empty" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Danh sách bàn trống</h4>
                    <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class='col-4'>
                                        <input class="form-control" id="search" type="text" placeholder="Tìm kiếm...">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>ID</th>
                                                    <th>Tên</th>
                                                    <th>Khu vực</th>
                                                    <th>Trạng thái</th>
                                                    @canany(['system.permission.management'])
                                                        <th class="text-center">Hành động</th>
                                                    @endcanany
                                                </tr>
                                            </thead>

                                            <tbody id='content'>
                                                <?php $temp = 0; ?>
                                                @if(!empty($all_table_empty))
                                                    @foreach($all_table_empty as $value)
                                                        <tr>
                                                            <th scope="row">{{ ++$loop->index }}</th>
                                                            <th scope="row"><span class="badge bg-success">{{ $value->id }}</span></th>
                                                            <th scope="row">{{ $value->table_name }}</th>
                                                            <th scope="row" class='text-primary'>{{ empty($value->sub_id) ? 'Chưa thêm' : $value->area->sub_name }}</th>
                                                            <th scope="row">Trống</th>
                                                            @canany(['system.permission.management'])
                                                                <td scope="row" class="text-center">
                                                                    <button wire:click="deleteTable({{ $value->id }})" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                                        <i class="mdi mdi-delete" title='Xóa'></i>
                                                                    </button>
                                                                </td>
                                                            @endcanany
                                                        </tr>
                                                        <?php $temp++; ?>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="page-title-box">
                                            @if($temp == 0)
                                                <h6 class="page-title" style="text-align: center;">Trống!</i></h6>
                                            @endif
                                        </div>
                                        {{ $all_table_empty->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click='' data-bs-dismiss="modal" style='padding-left: 30px;padding-right: 30px;' class="btn btn-secondary"><i class='fa fa-times-circle mr-1'></i> Đóng </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @section('script')
        <script>
            window.addEventListener('show-all-table-empty', event => {
                $('#all-table-empty').modal('show');
            })
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