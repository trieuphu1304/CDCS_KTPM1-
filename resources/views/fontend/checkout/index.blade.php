<body>	
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Product Checkout</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
      <!-- ================ end banner area ================= -->
    
    
    <!--================Checkout Area =================-->
    <section class="checkout_area section-margin--small">
        <div class="container">
            <div class="returning_customer">
                <div class="check_title">
                    <h2>Returning Customer? <a href="{{route('login.index')}}">Click here to login</a></h2>
                </div>
               
            </div>
            <div class="cupon_area">
              
            </div>
          <div class="billing_details">
              <div class="row">
                  <div class="col-lg-12">
                    <form method="POST" action="{{ route('checkout') }}">
                        @csrf
                        <h3>Billing Details</h3>
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name ?? '' }}" required>
                                
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                            </div>
                            <ul class="list">
                                @foreach($cart as $item)
                                    <li>
                                        <a href="#">{{ $item['name'] }} 
                                            <span class="middle">x {{ $item['quantity'] }}</span> 
                                            <span class="last">{{ number_format($item['price'], 0, ',', '.') }} VND</span>
                                        </a>
                                    </li>
                                @endforeach
                            
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Subtotal <span>{{ number_format($total, 0, ',', '.') }} VND</span></a></li>
                                <li><a href="#">Shipping <span>50.00 VND</span></a></li>
                                <li><a href="#">Total <span>{{ number_format($total + 50, 0, ',', '.') }} VND</span></a></li> 
                            </ul>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms &amp; conditions*</a>
                            </div>
                            <div class="text-center">
                                @if (Auth::check())
                                    <button type="submit" class="button button-paypal">Đặt hàng</button> 
                                @else
                                    <p>Vui lòng <a href="{{ route('login.index') }}">đăng nhập</a> để tiếp tục đặt hàng.</p>
                                    <a href="{{ route('login.index') }}" class="button button-login">Đăng nhập</a>
                                @endif
                                
                        </div>
                    </form>
                    </div>
                  </div>
                
              </div>
          </div>

          
      </div>
    </section>
  
  </body>