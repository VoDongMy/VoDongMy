@extends('layouts.master')
@section('main')
    <section id="category-grid">
        <div class="container">
            <!-- ========================================= SIDEBAR ========================================= -->
            @include('layouts.sidebar_product')
            <!-- ========================================= SIDEBAR : END ========================================= -->
            <!-- ========================================= CONTENT ========================================= -->
            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
                <div id="grid-page-banner">
                    <a href="#">
                        {{HTML::image("lib/images/banners/banner-gamer.jpg")}}
                    </a>
                </div>
                <section id="gaming">
                    <div class="grid-list-products">
                        <h2 class="section-title">Gaming</h2>
                        <div class="control-bar">
                            <div id="popularity-sort" class="le-select" >
                                <select data-placeholder="sort by popularity">
                                    <option value="1">1-100 players</option>
                                    <option value="2">101-200 players</option>
                                    <option value="3">200+ players</option>
                                </select>
                            </div>
                            <div id="item-count" class="le-select">
                                <select>
                                    <option value="1">24 per page</option>
                                    <option value="2">48 per page</option>
                                    <option value="3">32 per page</option>
                                </select>
                            </div>
                            <div class="grid-list-buttons">
                                <ul>
                                    <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> Grid</a></li>
                                    <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> List</a></li>
                                </ul>
                            </div>
                        </div><!-- /.control-bar -->
                        <div class="tab-content">
                            <div id="grid-view" class="products-grid fade tab-pane in active">
                                <div class="product-grid-holder">
                                    <div class="row no-margin">
                                        @for($i=0; $i<3; $i++)
                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon red"><span>sale</span></div>
                                                <div class="ribbon blue"><span>new!</span></div>
                                                <div class="ribbon green"><span>bestseller</span></div>
                                                <div class="image">
                                                    {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset("lib/images/products/product-01.jpg")))}}
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
                                                </div>
                                                <div class="hover-area">
                                                    <div class="add-cart-button">
                                                        <a href="single-product.html" class="le-button">add to cart</a>
                                                    </div>
                                                    <div class="wish-compare">
                                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                        <a class="btn-add-to-compare" href="#">compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->
                                        @endfor
                                    </div><!-- /.row -->
                                </div><!-- /.product-grid-holder -->
                                <div class="pagination-holder">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 text-left">
                                            <ul class="pagination ">
                                                <li class="current"><a  href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">next</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="result-counter">
                                                Showing <span>1-9</span> of <span>11</span> results
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->
                            </div><!-- /.products-grid #grid-view -->
                            <div id="list-view" class="products-grid fade tab-pane ">
                                <div class="products-list">
                                    @for($i=0; $i<3; $i++)
                                    <div class="product-item product-item-holder">
                                        <div class="ribbon red"><span>sale</span></div>
                                        <div class="ribbon blue"><span>new!</span></div>
                                        <div class="ribbon green"><span>bestseller</span></div>
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset("lib/images/products/product-01.jpg")))}}
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                    <div class="excerpt">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis euismod erat sit amet porta. Etiam venenatis ac diam ac tristique. Morbi accumsan consectetur odio ut tincidunt.</p>
                                                    </div>
                                                    <div class="addto-compare">
                                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">$1199.00</div>
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="availability"><label>availability:</label><span class="available">  in stock</span></div>
                                                    <a class="le-button" href="#">add to cart</a>
                                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->
                                    @endfor
                                </div><!-- /.products-list -->
                                <div class="pagination-holder">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 text-left">
                                            <ul class="pagination">
                                                <li class="current"><a  href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">next</a></li>
                                            </ul><!-- /.pagination -->
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="result-counter">
                                                Showing <span>1-9</span> of <span>11</span> results
                                            </div><!-- /.result-counter -->
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->
                            </div><!-- /.products-grid #list-view -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.grid-list-products -->
                </section><!-- /#gaming -->
            </div><!-- /.col -->
            <!-- ========================================= CONTENT : END ========================================= -->
        </div><!-- /.container -->
    </section><!-- /#category-grid -->
    <!-- ================ Alert ================= -->
        <div class="modal fade no-cart-alert">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Message</h4>
              </div>
              <div class="modal-body">
                <p>{{Session::get('not_cart')}}&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <!-- ================ End Alert ============= -->
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        <?php if(Session::has('not_cart')) { ?>
            $('.no-cart-alert').modal('show');
        <?php } ?>
    });
</script>
@stop