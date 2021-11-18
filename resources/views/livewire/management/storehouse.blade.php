<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Quán cafe</li>
                        <li class="breadcrumb-item active">Quản lý kho</li>
                        <li class="breadcrumb-item active">Tình trạng kho</li>
                    </ol>
                </div>
                <h4 class="page-title">Tình trạng kho</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Chi tiết</h4>

                    <ul class="nav nav-tabs nav-bordered nav-justified">
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
                        <li class="nav-item">
                            <a href="#all" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                Tất cả
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="drinks">
                                <div class='col-3'>
                                    <input class="form-control" id="search1" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>HSD</th>
                                                <th>Nhà cung cấp</th>
                                                <th>Số lượng</th>
                                                <th>Ngày nhập kho gần nhất</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody id='content1'>
                                            <?php $temp = 0; ?>
                                            @if(!empty($drink))
                                            @foreach($drink as $value)
                                            <tr>
                                                <th scope="row">{{ ++$loop->index }}</th>
                                                <th scope="row"><span class="badge bg-success">{{ $value->drink_id }}</span></th>
                                                <th scope="row">{{ $value->drink_name }}</th>
                                                <th scope="row" class='text-primary'>{{ $value->date_exp }}</th>
                                                <th scope="row">{{ $value->provider->provider_name }}</th>
                                                <td scope="row">@if($value->amount != 0)<span class="badge bg-danger"> {{ $value->amount }} </span> @else <span class="text-muted">Hết</span> @endif</td>
                                                <th scope="row">{{ $value->date_add }}</th>
                                                <td scope="row" class="text-center">
                                                    <button wire:click="deleteDrink({{ $value->drink_id }})" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                        <i class="mdi mdi-delete" title='Xóa'></i>
                                                    </button>
                                                </td>
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

                                </div>
                                {{$drink->links()}}
                            </div>

                            <div class="tab-pane " id="ingredents">
                                <div class='col-3'>
                                    <input class="form-control" id="search2" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>HSD</th>
                                                <th>Nhà cung cấp</th>
                                                <th>Số lượng</th>
                                                <th>Ngày nhập kho gần nhất</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody id='content2'>
                                            <?php $temp1 = 0; ?>
                                            @if(!empty($ingredent))
                                            @foreach($ingredent as $value)
                                            <tr>
                                                <th scope="row">{{ ++$loop->index }}</th>
                                                <th scope="row"><span class="badge bg-success">{{ $value->ingredent_id }}</span></th>
                                                <th scope="row">{{ $value->ingredent_name }}</th>
                                                <th scope="row" class='text-primary'>{{ $value->date_exp }}</th>
                                                <th scope="row">{{ $value->provider->provider_name }}</th>
                                                <td scope="row">@if($value->amount != 0)<span class="badge bg-danger"> {{ $value->amount }} </span> @else <span class="text-muted">Hết</span> @endif</td>
                                                <th scope="row">{{ $value->date_add }}</th>
                                                <td scope="row" class="text-center">
                                                    <button wire:click="deleteIngredent({{ $value->ingredent_id }})" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                        <i class="mdi mdi-delete" title='Xóa'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $temp1++; ?>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="page-title-box">
                                        @if($temp1 == 0)
                                        <h6 class="page-title" style="text-align: center;">Trống!</h6>
                                        @endif
                                    </div>

                                </div>
                                {{$ingredent->links()}}
                            </div>
                            <div class="tab-pane " id="all">
                                <div class='col-3'>
                                    <input class="form-control" id="search3" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                            <tr>
                                                <th>Danh mục</th>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>HSD</th>
                                                <th>Số lượng</th>
                                                <th>Ngày nhập kho gần nhất</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody id='content3'>
                                            <?php $temp1 = 0; ?>
                                            @if(!empty($ingredent))
                                                @foreach($ingredent as $value)
                                                    <tr>
                                                        <th scope="row">Nguyên liệu</th>
                                                        <th scope="row"><span class="badge bg-success">{{ $value->ingredent_id }}</span></th>
                                                        <th scope="row">{{ $value->ingredent_name }}</th>
                                                        <th scope="row" class='text-primary'>{{ $value->date_exp }}</th>
                                                        <td scope="row">@if($value->amount != 0)<span class="badge bg-danger"> {{ $value->amount }} </span> @else <span class="text-muted">Hết</span> @endif</td>
                                                        <th scope="row">{{ $value->date_add }}</th>
                                                        <td scope="row" class="text-center">
                                                            <button wire:click="deleteIngredent({{ $value->ingredent_id }})" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                                <i class="mdi mdi-delete" title='Xóa'></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php $temp1++; ?>
                                                @endforeach
                                            @endif
                                            <?php $temp = 0; ?>
                                            @if(!empty($drink))
                                                @foreach($drink as $value)
                                                    <tr>
                                                        <th scope="row">Thức uống đóng chai</th>
                                                        <th scope="row"><span class="badge bg-success">{{ $value->drink_id }}</span></th>
                                                        <th scope="row">{{ $value->drink_name }}</th>
                                                        <th scope="row" class='text-primary'>{{ $value->date_exp }}</th>
                                                        <td scope="row">@if($value->amount != 0)<span class="badge bg-danger"> {{ $value->amount }} </span> @else <span class="text-muted">Hết</span> @endif</td>
                                                        <th scope="row">{{ $value->date_add }}</th>
                                                        <td scope="row" class="text-center">
                                                            <button wire:click="deleteDrink({{ $value->drink_id }})" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                                <i class="mdi mdi-delete" title='Xóa'></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php $temp++; ?>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="page-title-box">
                                        @if($temp1 == 0 && $temp == 0)
                                        <h6 class="page-title" style="text-align: center;">Trống!</h6>
                                        @endif
                                    </div>

                                </div>
                                {{$ingredent->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    @section('script')
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