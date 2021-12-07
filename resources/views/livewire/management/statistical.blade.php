<div>

    <div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quán coffee</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Menu và pha chế</a></li>
                            <li class="breadcrumb-item active">Thống kê</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Thống kê</h4>
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
                                <div class="avatar-lg rounded-circle bg-primary">
                                    <i class="fe-tag font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-home">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $revenue }}</span> VND</h3>
                                    <p class="text-muted mb-1 text-truncate">Doanh thu</p>
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
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $order }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Số đơn</p>
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
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $importgoods }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Nhập kho</p>
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
                                <div class="avatar-lg rounded-circle bg-danger">
                                    <i class="fe-tag font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-home">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Hết hạn</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Biểu đồ doanh thu trong ngày</h4>
                        <div class="w-full" style="height: 50%;">
                            <div class="px-10" id='chart'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Thống kê số lượng món đã bán</h4>
                        <div class='col-3'>
                            <input class="form-control" id="search" type="text" placeholder="Tìm kiếm trong bảng hiện tại..">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody id='content'>
                                    @if(!empty($drink_sale))
                                    @foreach($drink_sale as $drink_sal=>$val)
                                    <tr>
                                        <th>{{ ++$loop->index }}</th>
                                        <th>{{ $drink_sal }}</th>
                                        <th>{{ $val }}</th>
                                        <th>
                                            @if(($loop->index == 1 || $loop->index == 2 || $loop->index == 3 || $loop->index == 4 || $loop->index == 5) && $val>9 )
                                            Bán chạy <i class="fa fa-star" style="font-size:20px;color:yellow"></i>
                                            @endif
                                        </th>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-5">
                <div class="card border border-success">
                    <div class="card-body">
                        <div class="w-full" style="height: 50%;">
                            <div class="px-10" id='chartColumn'></div>
                        </div>
                    </div>
                </div>
            </div>
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
        <!-- Chart js-->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var options = {
                chart: {
                    type: 'line',
                    height: '400px',
                    
                },
                colors:['#F44336', '#E91E63', '#9C27B0'],
                series: [{
                    name: 'Doanh thu',
                    data: @json($value_revenue)
                }],
                xaxis: {
                    categories: @json($date_revenue)
                }
            }

            var chart = new ApexCharts(document.querySelector("#chart"), options);

            chart.render();
        </script>
        <script>
            var optionss = {
                series: [{
                    name: 'Số lượng',
                    data: @json($value_drink_sale)
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val ;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#ffb247"]
                    }
                },

                xaxis: {
                    categories: @json($data_drink_sale),
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function(val) {
                            return val ;
                        }
                    }

                },
                title: {
                    text: 'BIỂU ĐỒ SÔ LƯỢNG MÓN BÁN RA',
                    floating: true,
                    offsetY: 330,
                    align: 'center',
                    style: {
                        color: '#000000'
                    }
                }
            };
            var chart1 = new ApexCharts(document.querySelector("#chartColumn"), optionss);
            chart1.render();
        </script>
        @endsection
    </div>
</div>