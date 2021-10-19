<div>
    <style>
        body {
            font-family: DejaVu Sans;
        }
    </style>
    <div class='card'> <span style="float:right;">Quán coffee</span></div>
    <div class="header">
        <h3 class="title">Thông tin nhân sự</h3>
    </div>
    <div>
        <div class="table-responsive">
            <table class="table table-centered table-bordered table-striped mb-0">
                <tbody>
                    @if(!empty($detail))
                    <tr>
                        <td style="widtd: 35%;">Tên</td>
                        <td>: </td>
                        <td>{{ $detail['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Chức vụ</td>
                        <td>: </td>
                        <td>@foreach($role as $rol)
                            @if($detail->hasRole($rol->name))
                            {{ $rol->name }}
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>: </td>
                        <td>{{ $detail['profile']['birthday'] }}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>: </td>
                        <td>{{ $detail['profile']['phone'] }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: </td>
                        <td>{{ $detail['email'] }}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>: </td>
                        <td>{{ $detail['profile']['address'] }}
                    </tr>
                    @endif
                </tbody>
            </table>
        </div> <!-- end .table-responsive -->
        
    </div>

</div>