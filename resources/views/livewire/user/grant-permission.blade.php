<div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Quản lý tài khoản</a></li>
                            <li class="breadcrumb-item active">Cấp quyền hệ thống </li>
                        </ol>
                    </div>
                    <h2 class="page-title">Cấp quyền hệ thống</h2>
                </div>
            </div>
        </div>
        <div class="card border-primary border mb-3">
            <div class="card-body">
                <h4 class="card-title text-primary">Cấp quyền cho tài khoản: <i> {{$results_user->name}} </i></h4>
                <?php
                    $a = 0;
                    $b = 0;
                ?>
                <span class="message">Nhóm quyền hiện tại: </i></span>
                @foreach($results_roles as $role)
                    @if($results_user->hasRole($role->name))
                        {{ ' | '.$role->name }}
                        <?php $a++; ?>
                    @endif
                @endforeach
                @if($a == 0)
                    {{'Chưa cấp'}}
                @endif
                <br />
                <span class="message">Quyền hiện tại: </i></span>
                @foreach( $results_permissions as $per=>$val)
                    @if($results_user->hasPermissionTo($val['name']))
                        {{ ' | '.$val['title'] }}
                        <?php $b++; ?>
                    @endif
                @endforeach
                @if($b == 0)
                    {{'Chưa cấp'}}
                @endif

                <br />
                <br />
                <div>
                    <form class="permission" method="GET" wire:submit.prevent='addPermission({{ $results_user->user_id }})'>
                        @csrf
                        <div class="row">
                            <div class="col-lg-8" style="margin: auto;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="header-title">Nhóm người dùng</h4>
                                        <br />
                                        <div class="form-check mb-2 form-check-warning">
                                            <input class="form-check-input" wire:model.lazy='role' type="checkbox" value="0" id="customckeck7">
                                            <label class="form-check-label" for="customckeck7">Thu hồi nhóm quyền</label>
                                        </div>
                                        @foreach($results_roles as $results_role)
                                            <div class="form-check mb-2 form-check-blue">
                                                <input class="form-check-input" wire:model.lazy='role' type="checkbox" value="{{ $results_role->id }}" id="customckeck7">
                                                <label class="form-check-label" for="customckeck7">{{ $results_role->name }}</label>
                                            </div>
                                        @endforeach

                                        <div class="clearfix"></div>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <div class="col-lg-6" style="float: right;">
                                        <h4 class="header-title">Quyền bổ sung</h4>
                                        <br />
                                        <div class="form-check mb-2 form-check-warning">
                                            <input class="form-check-input" wire:model.lazy='permission' type="checkbox" value="0" id="customckeck7">
                                            <label class="form-check-label" for="customckeck7">Thu hồi quyền</label>
                                        </div>
                                        @foreach($results_permissions as $results_permission => $per)
                                            <div class="form-check mb-2 form-check-danger">
                                                <input class="form-check-input" wire:model.lazy='permission' type="checkbox" value="{{ $per['name'] }}" id="customckeck7">
                                                <label class="form-check-label" for="customckeck7">{{ $per['title'] }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2" style='padding: 20px; float:right;'>
                            <div>
                                <button style='padding-left: 30px;padding-right: 30px;' class="btn btn-success" type="submit"> XONG </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
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