<section class="blog">
    <div class="container">
      <div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Latest <span class="section-intro__style">News</span></h2>
      </div>

      <div class="row">
            @foreach($blog as $blog)
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card card-blog">
                        <div class="card-blog__img">
                        <img src="{{ asset('upload/blog/' .$blog->image)}}">
                        </div>
                        <div class="card-body">
                        <ul class="card-blog__info">
                            <li><a href="#">By Admin</a></li>
                            <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                        </ul>
                        <p>{{ $blog->name }}</p>
                        <p>{{ $blog->description }}</p>
                        <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
      </div>
    </div>
  </section>