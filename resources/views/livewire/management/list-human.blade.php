<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Quản lý nhân sự</a></li>
                        <li class="breadcrumb-item active">Danh sách nhân sự </li>
                    </ol>
                </div>
                <h4 class="page-title">Danh sách nhân sự</h4>
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
                            <div class="avatar-lg rounded-circle bg-success">
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
                    <h4 class="header-title mb-4">Danh sách</h4>
                    <div class='col-3'>
                        <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Chức vụ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody id='content'>
                                <?php $temp = 0; ?>
                                @if(!empty($link))
                                    <?php $dem = 1; ?>
                                    @foreach ($link as $value)
                                        @if($value->email != 'admin@gmail.com')
                                            <tr>
                                                <td scope="row"><span class="badge bg-soft-warning text-danger">{{++$loop->index}}</span></td>
                                                <td scope="row">{{$value->name}}</td>
                                                <td scope="row">{{$value->email}}</td>
                                                <td scope="row">{{$value->profile->phone}}</td>
                                                <td scope="row"> <span class="badge bg-warning">
                                                        @foreach($role as $rol)
                                                            @if($value->hasRole($rol->name))
                                                                {{ $rol->name }}
                                                            @endif
                                                        @endforeach
                                                    </span></td>
                                                <td scope="row">
                                                    <button wire:click='detail({{ $value }})' class="btn btn-outline-success btn-rounded waves-effect waves-light">
                                                        Hồ sơ
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                                $temp++; 
                                            ?>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- Modal -->

                        @if($showDetail)
                            <div class="modal fade" wire:ignore.self id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thông tin nhân sự</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-centered table-borderless table-striped mb-0">
                                                    <tbody>
                                                        @if(!empty($detail))
                                                            <tr>
                                                                <th style="width: 35%;">Tên</th>
                                                                <td>{{ $detail['name'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Chức vụ</th>
                                                                <td>@foreach($role as $rol)
                                                                        @if($detail->hasRole($rol->name))
                                                                            {{ $rol->name }}
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Ngày sinh</th>
                                                                <td>{{ $detail['profile']['birthday'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Số điện tdoại</th>
                                                                <td>{{ $detail['profile']['phone'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td>{{ $detail['email'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Địa chỉ</th>
                                                                <td>{{ $detail['profile']['address'] }}
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div> <!-- end .table-responsive -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='fa fa-times-circle mr-1'></i> Close</button>
                                            <button type="button" wire:click='print({{ $detail }})' class="btn btn-primary"><i class='fa fa-print mr-1'></i> In</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
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
    @section('script')
        <script>
            window.addEventListener('show-detail', event => {
                $('#detail').modal('show');
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
    @endsection
    <!-- end row -->
</div>