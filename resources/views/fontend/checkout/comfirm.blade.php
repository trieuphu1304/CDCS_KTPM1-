<body>
    
    <section class="blog-banner-area" id="category">
          <div class="container h-100">
              <div class="blog-banner">
                  <div class="text-center">
                      <h1>Order Confirmation</h1>
                      <nav aria-label="breadcrumb" class="banner-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
              </ol>
            </nav>
                  </div>
              </div>
      </div>
    </section>
      <!-- ================ end banner area ================= -->
    
    <!--================Order Details Area =================-->
    <section class="order_details section-margin--small">
      <div class="container">
        <p class="text-center billing-alert">Thank you. Your order has been received.</p>
        <div class="row mb-5">
          <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
            
          </div>
          <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
            
          </div>
          <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
            
          </div>
        </div>
        <div class="order_details_table">
          <h2>Order Details</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @php
                $subtotal = 0;
                @endphp
                @foreach($cart as $item)
                    @php
                        $subtotal += $item['price'] * $item['quantity']; 
                    @endphp
                <tr>
                    <td>
                      <p>{{ $item['name'] }} </p>
                    </td>
                    <td>
                      <h5>x {{ $item['quantity'] }}</h5>
                    </td>
                    <td>
                      <p>{{ number_format($item['price'], 0, ',', '.') }} VND</p>
                    </td>
                  </tr>
                @endforeach
                  <tr>
                    <td>
                      <h4>Subtotal</h4>
                    </td>
                    <td>
                      <h5></h5>
                    </td>
                    <td>
                      <p>{{ number_format($subtotal, 0, ',', '.') }} VND</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4>Shipping</h4>
                    </td>
                    <td>
                      <h5></h5>
                    </td>
                    <td>
                      <p>50.00 VND</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4>Total</h4>
                    </td>
                    <td>
                      <h5></h5>
                    </td>
                    <td>
                      <h4>{{ number_format($subtotal + 50, 0, ',', '.') }} VND</h4>
                    </td>
                  </tr>
                  
              </tbody>
              
            </table>
            
          </div>
          <div class="checkout_btn_inner d-flex align-items-center">
            <a style="padding: 0px 41px; margin-top: 30px; margin-left: auto;" class="gray_btn" href="{{route('category.index')}}">Continue Shopping</a>
          </div>
          
        </div>
      </div>
    </section>
  
  </body>