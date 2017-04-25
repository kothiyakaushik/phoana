@extends('layouts.frontend')

@section('title', "Dashboard")

@section('content_writer')
<div id="content"> <!-- Content -->
  <div class="container">
      <div class="home-content">
          <div class="cat-offers">
              <div class="row">
                  <div class="col-md-4">
                      <div class="cat-sec-1">
                          <img src="http://placehold.it/360x358&text=images here" class="img-responsive" alt="">
                          <div class="cat-desc">
                              <div class="cat-inner">
                                  <div class="cat-title">man<span>Clothing</span></div>
                                  <a href="" class="btn btn-border">Buy Now</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="cat-sec-2">
                          <img src="http://placehold.it/360x358&text=images here" class="img-responsive" alt="">
                           <div class="cat-desc">
                               <div class="cat-inner">
                                  <div class="cat-title">woman<span>Clothing</span></div>
                                  <a href="" class="btn btn-border">Buy Now</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="cat-sec-3">
                          <img src="http://placehold.it/360x358&text=images here" class="img-responsive" alt="">
                           <div class="cat-desc">
                               <div class="cat-inner">
                                  <div class="cat-title">accessories<span>collections - 2014</span></div>
                                  <a href="" class="btn btn-border">shop Now</a>
                               </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <div class="newest">
      <div class="container">
          <div class="newest-content">
              <div class="newest-tab">
                  <ul id="myTab" class="nav nav-tabs newest" role="tablist">
                      <li role="presentation" class="active">
                          <a href="#1" id="cat-1" role="tab" data-toggle="tab" aria-controls="1" aria-expanded="true">Featured</a>
                      </li>
                      <li role="presentation">
                          <a href="#2" role="tab" id="cat-2" data-toggle="tab" aria-controls="2">New Arrivals</a>
                      </li>
                      <li role="presentation">
                          <a href="#3" role="tab" id="cat-3" data-toggle="tab" aria-controls="3">Best Seller</a>
                      </li>
                  </ul>
                  
                  
                  <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="1" aria-labelledby="cat-1">
                          <div class="row clearfix">
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control" class="owl-carousel owl-theme clearfix">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  
                                  <div class="product-name">
                                      <a href="">Adidas Striped Men's Round Neck T-Shirt</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image2" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control2" class="owl-carousel owl-theme">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  <div class="product-name">
                                      <a href="">Women's Jeans</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image3" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control3" class="owl-carousel owl-theme">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  <div class="product-name">
                                      <a href="">Running Shoes</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image4" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control4" class="owl-carousel owl-theme">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  <div class="product-name">
                                      <a href="">men's Jeans</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>
                              
                              <div class="clearfix"></div>
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image5" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control5" class="owl-carousel owl-theme">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  <div class="product-name">
                                      <a href="">Striped Men's Round Neck T-Shirt</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image6" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control6" class="owl-carousel owl-theme">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  <div class="product-name">
                                      <a href="">Women's Round Neck T-Shirt</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image7" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control7" class="owl-carousel owl-theme">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  <div class="product-name">
                                      <a href="">men's Jeans</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>
                              <div class="col-md-3 prdct-grid">
                                  <div class="product-fade">
              <div class="product-fade-wrap">
                                            <div id="product-image8" class="owl-carousel owl-theme">
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                                <div class="item"><img src="http://placehold.it/263x263&text=images here" alt="" class="img-responsive"></div>
                                            </div>
                <div class="product-fade-ct">
                                                <div class="product-fade-control">
                                                    <div class="to-left">
                                                        <a href=""><i class="fa fa-heart"></i></a>
                                                        <a href=""><i class="fa fa-retweet"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                    <div class="to-right">
                                                        <div id="product-control8" class="owl-carousel owl-theme">
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            <div class="item"><div class="bullets"></div></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <a href="" class="btn btn-to-cart"><span class="bag"></span><span>Add To cart</span><div class="clearfix"></div></a>
                                                </div>
                                                
                </div>
              </div>
                                  </div>
                                  <div class="product-name">
                                      <a href="">Heels</a>
                                  </div>
                                  <div class="star-1"></div>
                                  <div class="product-price">
                                      <span>$19.00</span> $15.00
                                  </div>
                              </div>

                          </div>
                      </div>
                      
                      <div role="tabpanel" class="tab-pane fade" id="2" aria-labelledby="cat-2">
                          <div class="row">
                              <div class="col-md-12">
                                  <p>....</p>
                              </div>
                          </div>
                      </div>
                      
                      <div role="tabpanel" class="tab-pane fade" id="3" aria-labelledby="cat-3">
                          <div class="row">
                              <div class="col-md-12">
                                  <p>....</p>
                              </div>
                          </div>
                      </div>
                      
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
  
  <div class="content-offers">
      <div class="container">
          <div class="ct-offers">
              <div class="ct-offers-title">Tommy Hilfiger<br/>Women’s</div>
              <p>The generated Lorem Ipsum is therefore always free from repetition, injected humour</p>
              <a href="" class="btn btn-blue">Discover more Product</a>
          </div>
      </div>
  </div>
  
  <div class="brands">
      <div class="container">
          <div class="brands-inner">
              <div class="brand-title">
                  <span>Brands</span>
              </div>
              
              <div id="slider-home"> <!-- Slider -->
                  <div id="brand-carousel" class="owl-carousel owl-theme">
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                      <div class="item">
                          <img src="http://placehold.it/228x100&text=images here" alt="slide-1" class="img-responsive">
                      </div>
                  </div>
              </div> <!-- Slider -->
              
          </div>
      </div>
  </div>
  
  <div class="rec-blog">
      <div class="container">
          <div class="rec-blog-inner">
              <div class="blog-title">
                  <span>The Blog</span>
              </div>
              <div class="row">
                  <div class="col-md-4 blog-ct">
                      <a href=""><img src="http://placehold.it/360x240&text=images here" alt="" class="img-responsive"></a>
                      <div class="blog-ct-title">
                          <a href="">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque !</a>
                          <span>May 11,2014</span>
                      </div>
                  </div>
                  <div class="col-md-4 blog-ct">
                      <a href=""><img src="http://placehold.it/360x240&text=images here" alt="" class="img-responsive"></a>
                      <div class="blog-ct-title">
                          <a href="">Voluptatem accusantium doloremque</a>
                          <span>May 11,2014</span>
                      </div>
                  </div>
                  <div class="col-md-4 blog-ct">
                      <a href=""><img src="http://placehold.it/360x240&text=images here" alt="" class="img-responsive"></a>
                      <div class="blog-ct-title">
                          <a href="">Voluptatem accusantium doloremque</a>
                          <span>May 11,2014</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> <!-- Content -->
@endsection