<div>
    <div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> Quản lý tài khoản</a></li>
                                <li class="breadcrumb-item active">Tạo nhóm người dùng </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tạo nhóm người dùng</h4>
                    </div>
                </div>
            </div>
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
                            @if(!empty($message))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <form class="permission" method="GET" wire:submit.prevent='addRole'>
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4 class="header-title">Tên nhóm người dùng</h4>
                                            <br />
                                            <div class="mb-3 row">
                                                <div class="col-sm-10">
                                                    <input wire:model.lazy='role' type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <br />
                                        <br />
                                        <br />
                                    </div>
                                    <div class='row'>
                                        <div class="col-lg-6">
                                            <h4 class="header-title">Thêm quyền cho nhóm</h4>
                                            <br />
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
                            <br />
                            <br />
                            <br />
                            <div class="col-md-2" style='padding: 20px;float: right;'>
                                <div>
                                    <button style='padding-left: 30px;padding-right: 30px;' class="btn btn-success" type="submit"> XONG </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>