@extends('layouts.admin.master')

@section('custom-css')
<!-- <style>
    .small-box{
        margin-bottom: 10px;
    }
    .small-box > .inner{
        padding: 10px 10px 3px 10px;
    }
    .small-box .icon {
        -webkit-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
        position: absolute;
        top: -15px;
        right: 10px;
        z-index: 0;
        font-size: 60px;
        color: rgba(0,0,0,0.15);
        padding-right: 10px;
    }
    h3, p{
        color: white;
    }
</style> -->
@endsection

@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_copy</i>
                                    </div>
                                    <p class="card-category">LOẠI SẢN PHẨM</p>
                                    <h3 class="card-title">{{ $loaisanpham_count }}
                                        <small>GB</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a>CATEGORY</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">store</i>
                                    </div>
                                    <p class="card-category">SẢN PHẨM</p>
                                    <h3 class="card-title">{{ $sanpham_count }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a>PRODUCT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    <p class="card-category">KHÁCH HÀNG</p>
                                    <h3 class="card-title">{{ $khachhang_count }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    <p class="card-category">ĐƠN HÀNG</p>
                                    <h3 class="card-title">{{ $donhang_count }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header card-header-success">
                                    <div class="ct-chart" id="dailySalesChart"></div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Daily Sales</h4>
                                    <p class="card-category">
                                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> updated 4 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                    </div>
                    
                </div>
            </div>
    <h4 style="text-align: center;">TỔNG DOANH THU TRONG NĂM</h4>
    <div class="row">
        <div class="col-md-12">
            <form method="get" action="#" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="thang">Chọn năm</label>
                    <input type="number" class="form-control" id="thang" name="thang">
                </div>
                <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
            </form>
        </div>
        <div class="col-md-12">
            <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
        </div>
    </div>
@endsection

@section('custom-scripts')
<script defer src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>

<!-- Các script dành cho thư viện Numeraljs -->
<script src="{{ asset('vendor/numeraljs/numeral.min.js') }}"></script>
<script>
// Đăng ký tiền tệ VNĐ
numeral.register('locale', 'vi', {
    delimiters: {
        thousands: ',',
        decimal: '.'
    },
    abbreviations: {
        thousand: 'k',
        million: 'm',
        billion: 'b',
        trillion: 't'
    },
    ordinal: function(number) {
        return number === 1 ? 'một' : 'không';
    },
    currency: {
        symbol: 'VND'
    }
});
// Sử dụng locate vi (Việt nam)
numeral.locale('vi');
</script>

<!-- Các script dành cho thư viện ChartJS -->
<script src="{{ asset('vendor/Chartjs/Chart.min.js') }}"></script>
<script>
$(document).ready(function() {
    var objChart;
    var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");
    $("#btnLapBaoCao").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('admin.baocao.donhang.data') }}',
            type: "GET",
            data: {
                // tuNgay: $('#tuNgay').val(),
                // denNgay: $('#denNgay').val(),
                thang: $('#thang').val(),
            },
            success: function(response) {
                var myLabels = [];
                var myData = [];
                $(response.data).each(function() {
                    myLabels.push((this.thoigian));
                    myData.push(this.tongThanhTien);
                });
                myData.push(0); // creates a '0' index on the graph
                if (typeof $objChart !== "undefined") {
                    $objChart.destroy();
                }
                $objChart = new Chart($chartOfobjChart, {
                    // The type of chart we want to create
                    type: "bar",
                    data: {
                        labels: myLabels,
                        datasets: [{
                            data: myData,
                            borderColor: "#9ad0f5",
                            backgroundColor: "#00c0ef",
                            borderWidth: 1
                        }]
                    },
                    // Configuration options go here
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            // text: "Báo cáo đơn hàng"
                            text: "Tổng doanh thu"
                        },
                        scales: {
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    // labelString: 'Ngày nhận đơn hàng'
                                    labelString: 'Tháng'
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    callback: function(value) {
                                        return numeral(value).format('0,0 $')
                                    }
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Tổng thành tiền'
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    return numeral(tooltipItem.value).format('0,0 $')
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            }
        });
    });
});
</script>
@endsection
