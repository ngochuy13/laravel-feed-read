@extends('layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-tab-report">
                        <div class="tab-report-header">
                            <div class="report-item active" data-id="1">
                                <p class="range">Hôm nay</p>
                                <p class="range-date">
                                    <span>Hôm qua</span>
                                </p>
                                <h2 class="revenue">0.00 ₫</h2>
                                <p class="order-total">0 đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="2">
                                <p class="range">Hôm qua</p>
                                <p class="range-date">
                                    <span>Hôm qua</span>
                                </p>
                                <h2 class="revenue">100.00 nghìn ₫</h2>
                                <p class="order-total">1 đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="3">
                                <p class="range">7 ngày trước</p>
                                <p class="range-date">
                                    <span>07/06/2017</span>
                                    <span> - </span>
                                    <span>Hôm qua</span>
                                </p>
                                <h2 class="revenue">1.47 triệu ₫</h2>
                                <p class="order-total">6 đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="4">
                                <p class="range">30 ngày trước</p>
                                <p class="range-date">
                                    <span>15/05/2017</span>
                                    <span> - </span>
                                    <span>Hôm qua</span>
                                </p>
                                <h2 class="revenue">2.47 triệu ₫</h2>
                                <p class="order-total">16 đơn hàng</p>
                            </div>
                            <div class="report-item" data-id="4">
                                <p class="range">90 ngày trước</p>
                                <p class="range-date">
                                    <span>15/03/2017</span>
                                    <span> - </span>
                                    <span>Hôm qua</span>
                                </p>
                                <h2 class="revenue">5.47 triệu ₫</h2>
                                <p class="order-total">36 đơn hàng</p>
                            </div>
                        </div>
                        <div class="tab-report-content">
                            <div class="report-content active" data-id='1'>
                                <h1>this is content of tab 1</h1>
                            </div>
                            <div class="report-content" data-id='2'>
                                <h1>this is content of tab 2</h1>
                            </div>
                            <div class="report-content" data-id='3'>
                                <h1>this is content of tab 3</h1>
                            </div>
                            <div class="report-content" data-id='4'>
                                <h1>this is content of tab 4</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="block-timeline">
                        <div class="panel panel-default  p-none mt20">
                            <div class="panel-heading text-left p-sm-l">
                                <span class="text-info pull-left">Hoạt động gần đây </span>
                                <div class="clear"></div>
                            </div>
                            <div class="timeline dashboard-timeline">
                                <div class="timeline-group">
                                    <ul class="top-data">
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054247" title="Áo Polo Nữ Summer 16">Áo Polo Nữ Summer 16</a>
                                            <span class="pull-right text-gray">Hôm qua 11:21 SA</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054247" title="Áo Polo Nữ Summer 16">Áo Polo Nữ Summer 16</a>
                                            <span class="pull-right text-gray">Hôm qua 11:21 SA</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054572" title="Áo Yoga Nữ - Xám">Áo Yoga Nữ - Xám</a>
                                            <span class="pull-right text-gray">12/06/2017 4:46 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054247" title="Áo Polo Nữ Summer 16">Áo Polo Nữ Summer 16</a>
                                            <span class="pull-right text-gray">12/06/2017 4:44 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054247" title="Áo Polo Nữ Summer 16">Áo Polo Nữ Summer 16</a>
                                            <span class="pull-right text-gray">12/06/2017 4:44 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054757" title="Áo Tanktop Nữ Xám Đen">Áo Tanktop Nữ Xám Đen</a>
                                            <span class="pull-right text-gray">12/06/2017 4:43 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004053411" title="Áo Bra Thể Thao Yoga Plus Hồng">Áo Bra Thể Thao Yoga Plus Hồng</a>
                                            <span class="pull-right text-gray">12/06/2017 4:42 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1005593371" title="Áo UFC Nữ - Đen">Áo UFC Nữ - Đen</a>
                                            <span class="pull-right text-gray">12/06/2017 4:33 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1005593371" title="Áo UFC Nữ - Đen">Áo UFC Nữ - Đen</a>
                                            <span class="pull-right text-gray">12/06/2017 4:30 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054757" title="Áo Tanktop Nữ Xám Đen">Áo Tanktop Nữ Xám Đen</a>
                                            <span class="pull-right text-gray">12/06/2017 4:29 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004054757" title="Áo Tanktop Nữ Xám Đen">Áo Tanktop Nữ Xám Đen</a>
                                            <span class="pull-right text-gray">12/06/2017 4:29 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1005376668" title="Áo hoodie active nữ">Áo hoodie active nữ</a>
                                            <span class="pull-right text-gray">12/06/2017 4:28 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1005376668" title="Áo hoodie active nữ">Áo hoodie active nữ</a>
                                            <span class="pull-right text-gray">12/06/2017 4:28 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004053411" title="Áo Bra Thể Thao Yoga Plus Hồng">Áo Bra Thể Thao Yoga Plus Hồng</a>
                                            <span class="pull-right text-gray">12/06/2017 4:27 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004051842" title="Áo bra thể thao CA Republik">Áo bra thể thao CA Republik</a>
                                            <span class="pull-right text-gray">12/06/2017 4:26 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004049858" title="Áo khoác Hoodie Thun Nam">Áo khoác Hoodie Thun Nam</a>
                                            <span class="pull-right text-gray">12/06/2017 4:25 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1004051729" title="Quần Short Nam">Quần Short Nam</a>
                                            <span class="pull-right text-gray">12/06/2017 4:23 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1005225318" title="Bio Synergy - Creatine monohydrate 500g">Bio Synergy - Creatine monohydrate 500g</a>
                                            <span class="pull-right text-gray">12/06/2017 2:15 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1005225489" title="Bio Synergy - Performance Arginine 125 capsules">Bio Synergy - Performance Arginine 125 capsules</a>
                                            <span class="pull-right text-gray">12/06/2017 2:13 CH</span>
                                        </li>
                                        <li class="item overflow-ellipsis">
                                            <i class="fa fa-tags border-cycle bg-slateGray"></i>
                                            <label>CMG CMG</label>
                                            <span class="item-quantity"> đã cập nhật sản phẩm: </span>
                                            <a href="product/#/detail/1005225396" title="Bio Synergy - WheyHey Coconut Protein Powder 2.25kg">Bio Synergy - WheyHey Coconut Protein Powder 2.25kg</a>
                                            <span class="pull-right text-gray">12/06/2017 2:12 CH</span>
                                        </li>
                                    </ul>
                                    <ul class="loadingtimeline">
                                        <li class="border-top overflow-ellipsis p-sm text-center">
                                            <a href="#" class="color-stateGray" data-bind="visible:IsShowLoadMore, click:LoadMore">
                                                <i class="fa fa-arrow-circle-down mr5"></i>
                                                <label class="cursor-pointer">Xem thêm</label>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Order need send</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Price</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Price</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable({
                "ajax": "json/order-need-send.json",
                    "columns": [
                        { "data": "id" },
                        { "data": "price" },
                        { "data": "number" },
                        { "data": "start_date" },
                        { "data": "status" }
                    ]
            });
            $('.block-tab-report .report-item').on('click', function(e){
                e.preventDefault();
                $('.block-tab-report .report-item').removeClass('active');
                $(this).addClass('active');
                var itemID = $(this).data('id');
                $('.block-tab-report .report-content').removeClass('active');
                $('.block-tab-report .report-content[data-id='+itemID+']').addClass('active');
            })
        } );
    </script>
@stop
