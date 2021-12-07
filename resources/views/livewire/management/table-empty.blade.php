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
                                    <p class="text-muted mb-1 text-truncate">Tổng số bàn trống</p>
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
                <h5 class="text-danger font-22">{{ $a->sub_name }}</h5>
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
    @section('script')
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