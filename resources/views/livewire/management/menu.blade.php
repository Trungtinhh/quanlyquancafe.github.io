<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Quán cafe</li>
                        <li class="breadcrumb-item active">Menu và pha chế</li>
                        <li class="breadcrumb-item active">Danh sách thức uống</li>
                    </ol>
                </div>
                <h4 class="page-title">Danh sách thức uống</h4>
            </div>
        </div>
    </div>
    @canany(['system.permission.management'])
    <div class="row">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button data-bs-target="#create-category" data-bs-toggle="modal" style='margin-bottom:10px;' class="btn btn-danger btn-rounded waves-effect waves-light">
                <i class="fe-plus-circle"></i> Thêm danh mục
            </button>
            <button data-bs-target="#create-category-drink" data-bs-toggle="modal" style='margin-bottom:10px;' class="btn btn-primary btn-rounded waves-effect waves-light">
                <i class="fe-plus-circle"></i> Thêm món vào danh mục
            </button>
            <button data-bs-target="#create-drink" data-bs-toggle="modal" style='margin-bottom:10px;' class="btn btn-success btn-rounded waves-effect waves-light">
                <i class="fe-plus-circle"></i> Thêm món mới
            </button>
        </div>
    </div>
    @endcanany
    <ul class="nav nav-pills navtab-bg nav-justified">
        <li class="nav-item">
            <a href="#category" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                Danh mục thức uống
            </a>
        </li>
        <li class="nav-item">
            <a href="#all" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                Tất cả
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="category">
            @if(!empty($Menu_category))
            <div class="row">
                @foreach($Menu_category as $cate)
                <div class="col-lg-6">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-primary py-3 text-white">
                            <div class="card-widgets">
                                @canany(['system.permission.management'])
                                <a wire:click="deleteMenuCategory( {{ $cate->menu_category_id }} )" class="text-light">
                                    <i class="mdi mdi-delete" title='Xóa'></i>
                                </a>
                                @endcanany
                                <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh" title='Làm mới'></i></a>
                                <a data-bs-toggle="collapse" href="#collapse{{ $cate->menu_category_id }}" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus" title='Thu nhỏ'></i></a>
                                <a href="#" data-toggle="remove"><i class="mdi mdi-close" title='Ẩn'></i></a>
                            </div>
                            <h4 class="card-title mb-0 text-white">
                                {{ $cate->menu_category_name }}
                            </h4>
                        </div>
                        <div id="collapse{{ $cate->menu_category_id }}" class="collapse show">
                            <div class="card-body">
                                <div class='col-3'>
                                    <input class="form-control" id="search{{ $cate->menu_category_id }}" type="text" placeholder="Tìm thức uống..">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody id='content{{ $cate->menu_category_id }}'>
                                            <?php $temp = 0 ?>
                                            @if(!empty($Drink))
                                            @foreach($Drink as $dri=>$drink)
                                            @if($drink[0]->menu_category_id == $cate->menu_category_id)
                                            <?php $temp++ ?>
                                            <tr>
                                                <th scope="row"><span class="badge bg-primary">{{ $temp }}</span></th>
                                                <th scope="row">{{ $dri }}</th>
                                                <td scope="row">{{ $drink[0]->drinkDetail->price->price_cost }}</td>
                                                <td scope="row">
                                                    <?php $drink_amount = 0; ?>
                                                    @foreach($drink as $val)
                                                    <?php $drink_amount += $val->drinkDetail->amount; ?>
                                                    @endforeach
                                                    @if($drink[0]->category == 1 )
                                                    @if($drink_amount != 0)
                                                    {{ $drink_amount }}
                                                    @else
                                                    Hết
                                                    @endif
                                                    @else
                                                    --
                                                    @endif
                                                </td>

                                                <td scope="row">
                                                    <button wire:click="drinkDetail('{{$dri}}')" class="btn btn-success btn-rounded waves-effect waves-light">
                                                        <i class="mdi mdi-text" title='Chi tiết'></i>
                                                    </button>
                                                    @canany(['system.permission.management'])
                                                    <button wire:click="showEditPrice('{{$dri}}')" class="btn btn-secondary btn-rounded waves-effect waves-light">
                                                        <i class="mdi mdi-file-edit" title='Sửa giá'></i>
                                                    </button>
                                                    <button wire:click="deleteMenuCategoryDrink('{{$dri}}')" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                        <i class="mdi mdi-delete" title='Xóa khỏi danh mục'></i>
                                                    </button>
                                                    @endcanany
                                                </td>
                                            </tr>
                                            @endif

                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="page-title-box">
                                        @if($temp == 0)
                                        <h6 class="page-title" style="text-align: center;"><i data-feather="alert-triangle" class="icon-dual-danger"></i>Trống !</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->
                @endforeach
            </div>
            @else
            <div class="row">
                <div class="col-lg-6">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-primary py-3 text-white">
                            <div class="card-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Không có món nào</h5>
                        </div>
                        <div id="cardCollpase5" class="collapse show">
                            <div class="card-body">
                                Chọn <a href="#">Thêm danh mục</a> để tạo danh mục thức uống cho Menu
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            @endif
        </div>

        <div class="tab-pane " id="all">
            <div class="card">
                <div class="card-body">
                    <div class='col-3'>
                        <input class="form-control" id="search_all" type="text" placeholder="Tìm thức uống..">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    @canany(['system.permission.management'])
                                    <th>Hành động</th>
                                    @endcanany
                                </tr>
                            </thead>

                            <tbody id='content_all'>
                                <?php $temp = 0 ?>
                                @if(!empty($Drink))
                                @foreach($Drink as $dri=>$drink)
                                <tr>
                                    <th scope="row"><span class="badge bg-primary">{{ ++$loop->index }}</span></th>
                                    <th scope="row">{{ $dri }}</th>
                                    <td scope="row">{{ $drink[0]->drinkDetail->price->price_cost }}</td>
                                    <td scope="row">
                                        <?php $drink_amount = 0; ?>
                                        @foreach($drink as $val)
                                        <?php $drink_amount += $val->drinkDetail->amount; ?>
                                        @endforeach
                                        @if($drink[0]->category == 1 )
                                        @if($drink_amount != 0)
                                        {{ $drink_amount }}
                                        @else
                                        Hết
                                        @endif
                                        @else
                                        --
                                        @endif
                                    </td>
                                    <td scope="row">
                                        <button wire:click="drinkDetail('{{ $dri }}')" class="btn btn-success btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-text" title='Chi tiết'></i>
                                        </button>
                                        @canany(['system.permission.management'])
                                        <button wire:click="showEditPrice('{{$dri}}')" class="btn btn-secondary btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-file-edit" title='Sửa giá'></i>
                                        </button>
                                        <button wire:click="deleteDrink('{{ $dri }}')" class="btn btn-danger btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-delete" title='Xóa'></i>
                                        </button>
                                        @endcanany
                                    </td>
                                </tr>
                                <?php $temp++ ?>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="page-title-box">
                            @if($temp == 0)
                            <h6 class="page-title" style="text-align: center;"><i data-feather="alert-triangle" class="icon-dual-danger"></i>Trống !</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" wire:ignore.self id="create-provider" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="GET" wire:submit.prevent='addProvider'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Thêm nhà cung cấp</h4>
                        <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border-success border mb-3">
                                    <div class="card-body">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Thông tin cơ bản</h5>

                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Tên nhà cung cấp </label>
                                            <input type="text" wire:model.lazy='provider_name' class="form-control">
                                            @error('provider_name')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="product-reference" class="form-label">Số điện thoại </label>
                                            <input type="text" wire:model.lazy='phone' class="form-control">
                                            @error('phone')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" wire:model.lazy='email' class="form-control">
                                            @error('email')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="product-summary" class="form-label">Địa chỉ</label>
                                            <textarea class="form-control" wire:model.lazy='address' rows="3"></textarea>
                                            @error('address')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="product-price">Tình trạng quan hệ </label>
                                            @error('relationship')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                            <br>
                                            <div>
                                                <input wire:model.lazy='relationship' type="radio" value='1' class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                                <span>Thân thiết</span>
                                            </div>
                                            <div>
                                                <input wire:model.lazy='relationship' type="radio" value='2' class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                                <span>Bình thường</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card border-success border mb-3">
                                    <div class="card-body">
                                        <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Hình ảnh</h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="file" wire:model="image">
                                                @error('image')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-7">
                                                @if ($image)
                                                Ảnh tải lên:
                                                <img src="{{ $image->temporaryUrl() }}" width="100px">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col-->
                                <div wire:loading class="text-center">Đang xử lý</div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div>
                    <div class="modal-footer">
                        <button wire:click='' type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button wire:click='' style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" wire:ignore.self id="create-category-drink" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="GET" wire:submit.prevent='addMenuCategoryDrink'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Thêm thức uống vào danh mục</h4>
                        <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card border-success border mb-3">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Danh mục sản phẩm</label>
                                            <select wire:model.lazy='drink_menu_category_id' class="form-control">
                                                <option value="">Chọn danh mục</option>
                                                @foreach($Menu_category as $value)
                                                <option value="{{ $value->menu_category_id }}">{{ $value->menu_category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('drink_menu_category_id')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Chọn sản phẩm</label>
                                            <div class="row">
                                                @foreach($DrinkNullMenuCategory as $drinkNull=>$vl)
                                                <div class="col-3">
                                                    <div class="form-check form-check-inline mb-2 form-check-primary">
                                                        <input class="form-check-input" wire:model.lazy='null_menu_category_name' type="checkbox" value="{{ $drinkNull }}" id="customckeck7">
                                                        <label class="form-check-label" for="customckeck7">{{ $drinkNull }}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @error('null_menu_category_name')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <div class="modal-footer">
                        <button wire:click='' type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button wire:click='' style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" wire:ignore.self id="create-category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <form method="GET" wire:submit.prevent='addCategory'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Thêm danh mục</h4>
                        <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card border-success border mb-3">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Tên danh mục</label>
                                            <input type="text" wire:model.lazy='menu_category_name' class="form-control">
                                            @error('menu_category_name')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click='' type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button wire:click='' style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" wire:ignore.self id="create-drink" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="GET" wire:submit.prevent='addDrink'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Thêm sản phẩm</h4>
                        <button type="button" wire:click='' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border-warning border mb-3">
                                    <div class="card-body">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Thông tin cơ bản</h5>
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Loại sản phẩm</label>
                                            <select wire:model.lazy='type' class="form-control">
                                                <option value="">Chọn danh mục</option>
                                                <option value="co_san">Có sẵn</option>
                                                <option value="pha_che">Pha chế</option>
                                            </select>
                                            @error('type')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        @if($type == 'co_san')
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label class="form-label" autocomplete="off">Nhà cung cấp</label>
                                                <select class="form-control" wire:model.lazy='provider'>
                                                    <option value="">Chọn nhà cung cấp</option>
                                                    @if(!empty($Pro))
                                                    @foreach($Pro as $pro)
                                                    <option value="{{ $pro->id }}"> {{ $pro->provider_name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <button wire:click='' type="button" data-bs-dismiss="modal" data-bs-target="#create-provider" class="btn btn-success btn-rounded waves-effect waves-light" data-bs-toggle="modal" style="font-size: 10px;">Thêm mới</button>
                                            </div>
                                            <div class="col-sm-12">
                                                @error('provider')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <br>
                                        @endif
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Tên sản phẩm</label>
                                            <input type="text" wire:model.lazy='drink_name' class="form-control">
                                            @error('drink_name')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Danh mục sản phẩm</label>
                                            <select wire:model.lazy='menu_category_id' class="form-control">
                                                <option value="">Chọn danh mục</option>
                                                @foreach($Menu_category as $value)
                                                <option value="{{ $value->menu_category_id }}">{{ $value->menu_category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('menu_category_id')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="product-reference" class="form-label">Giá </label>
                                            <input type="text" wire:model.lazy='drink_price' class="form-control">
                                            @error('drink_price')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        @if($type == 'co_san')
                                        <div class="mb-3">
                                            <label class="form-label">Hạn sử dụng</label>
                                            <input type="date" wire:model.lazy='drink_date_exp' class="form-control">
                                            @error('drink_date_exp')
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        @endif
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="card border-warning border mb-3">
                                    <div class="card-body">
                                        <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Hình ảnh</h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="file" wire:model="drink_image">
                                                @error('drink_image')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-7">
                                                @if ($drink_image)
                                                Ảnh tải lên:
                                                <img src="{{ $drink_image->temporaryUrl() }}" width="100px">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col-->
                                <br>
                                @if(!empty($noti))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ $noti }}
                                </div>
                                @endif
                                <br>
                                <div wire:loading class="text-center">Đang xử lý</div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div>
                    <div class="modal-footer">
                        <button wire:click='' type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button wire:click='' style='padding-left: 30px;padding-right: 30px;' class="btn btn-danger" type="submit"><i class="mdi mdi-check"></i> XONG </button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @if($statusModalDetail)
    <div class="modal fade" wire:ignore.self id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin thức uống</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-striped mb-0">
                            <tbody>
                                <div class="table-responsive">
                                    <table class="table table-centered table-borderless table-striped mb-0">
                                        <tbody>
                                            @if(!empty($drinkDetail))
                                            <tr>
                                                <th style="widtd: 35%;">Hình ảnh</th>
                                                <td><img src="{{ asset('storage/'.$drinkDetail_1[0]['image']) }}" width="100"></td>
                                            </tr>
                                            <tr>
                                                <th>Tên thức uống</th>
                                                <td>
                                                    {{ $drinkDetail_1[0]['drink_name']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Số lượng</th>
                                                <td>
                                                    @foreach($drinkDetail as $drinkdt)
                                                    @if($drinkdt->drink->category == 1 )
                                                    @if($drinkdt->amount != 0)
                                                    <ul>
                                                        <li>
                                                            {{ $drinkdt->provider->provider_name ." - ". $drinkdt->date_exp." : ". $drinkdt->amount }}
                                                        </li>
                                                    </ul>
                                                    @else
                                                    <ul>
                                                        <li>
                                                            {{ $drinkdt->provider->provider_name ." - ". $drinkdt->date_exp." : ". "Hết" }}
                                                        </li>
                                                    </ul>
                                                    @endif
                                                    @else
                                                    --
                                                    @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nhà cung cấp và HSD</th>
                                                <td>
                                                    @foreach($drinkDetail as $vl)
                                                    @if($drinkdt->drink->category == 1 )
                                                    <ul>
                                                        <li>
                                                            {{ $vl->provider->provider_name ." - ". $vl->date_exp}}
                                                        </li>
                                                    </ul>
                                                    @else
                                                    --
                                                    @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div> <!-- end .table-responsive -->
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='fa fa-times-circle mr-1'></i> Close</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endif
    @if($statusModalEditPrice)
    <div class="modal fade" wire:ignore.self id="edit-price" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa giá</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="product-reference" class="form-label">Nhập giá </label>
                        <input type="number" min='0' wire:model.lazy='edit_price_value' class="form-control">
                        @error('edit_price_value')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='fa fa-times-circle mr-1'></i> Close</button>
                        <button type="button" wire:click='editPrice("{{ $drink_edit_name }}")' class="btn btn-primary"><i class='fa fa-file-edit mr-1'></i> Sửa</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endif
    @section('script')
    <script>
        window.addEventListener('show-detail', event => {
            $('#detail').modal('show');
        })
    </script>
    <script>
        window.addEventListener('show-edit-price', event => {
            $('#edit-price').modal('show');
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#search_all").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#content_all tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    @if(!empty($Menu_category))
    @foreach($Menu_category as $cate)
    <script>
        $(document).ready(function() {
            $("#search{{ $cate->menu_category_id }}").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#content{{ $cate->menu_category_id }} tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    @endforeach
    @endif
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