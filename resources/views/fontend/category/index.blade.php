<html>
  <body>
    <section class="blog-banner-area" id="category">
      <div class="container h-100">
        <div class="blog-banner">
          <div class="text-center">
            <h1>Shop Category</h1>
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


	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <form action="{{ route('category.index') }}" method="GET">
              <select name="category" onchange="this.form.submit()">
                @foreach($productcategory as $category)
                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </form>
          </div>
         
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="sorting">
              <select>
                <option value="1">Default sorting</option>
                <option value="1">Default sorting</option>
                <option value="1">Default sorting</option>
              </select>
            </div>
            <div class="sorting mr-auto">
              <select>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
              </select>
            </div>
            <div>
              <div class="input-group filter-bar-search">
                <input type="text" placeholder="Search">
                <div class="input-group-append">
                  <button type="button"><i class="ti-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
              @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                  <div class="card text-center card-product">
                    <div class="card-product__img">
                      <img src="{{ asset('upload/products/' . $product->image) }}">
                      <ul class="card-product__imgOverlay">
                        <li><button><i class="ti-search"></i></button></li>
                        <li><button class="add-to-cart" data-product-id="{{ $product->id }}"><i class="ti-shopping-cart"></i></button></li>
                        <li><button><i class="ti-heart"></i></button></li>
                      </ul>
                    </div>
                    <div class="card-body">
                      {{ $product->productcategory->name ?? 'Danh mục không có' }}
                      <h4 class="card-product__title">
                        <h4 class="card-product__title">
                          <a href="{{ route('productdetail.index', $product->id) }}">{{ $product->name }}</a>
                        </h4>                      
                        <p class="card-product__price">{{ $product ->price}}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
	<!-- ================ category section end ================= -->		  


	<!-- ================ Subscribe section start ================= -->		  
  <section class="subscribe-position">
    <div class="container">
      <div class="subscribe text-center">
        <h3 class="subscribe__title">Get Update From Anywhere</h3>
        <p>Bearing Void gathering light light his eavening unto dont afraid</p>
        <div id="mc_embed_signup">
          <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
            <div class="form-group ml-sm-auto">
              <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
              <div class="info"></div>
            </div>
            <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
            <div style="position: absolute; left: -5000px;">
              <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
            </div>

          </form>
        </div>
        
      </div>
    </div>
  </section>
</body>
</html>

<script>
  // Lắng nghe sự kiện khi nhấn vào nút "Add to Cart"
  document.querySelectorAll('.add-to-cart').forEach(function(button) {
    button.addEventListener('click', function() {
      var productId = this.getAttribute('data-product-id');
      var quantity = 1;  // Mặc định là 1 sản phẩm khi nhấn thêm vào giỏ hàng

      // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
      fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          'products_id': productId,
          'quantity': quantity
        })
      })
      .then(response => response.json())
      .then(data => {
        // Cập nhật giỏ hàng và hiển thị thông báo thành công
        alert(data.message); // Bạn có thể thay thế bằng cách khác để thông báo
        document.querySelector('.nav-shop__circle').textContent = data.cartCount; // Cập nhật số lượng giỏ hàng
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });
</script>
