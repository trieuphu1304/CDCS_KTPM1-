<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Trang chủ /</span> Thêm blog
        </h4>
        
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <!-- Hiển thị lỗi nếu có -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Thêm danh mục</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="blog-name">Tên blog</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input 
                                        type="text" 
                                        id="blog-name" 
                                        name="name" 
                                        class="form-control" 
                                        placeholder="Nhập tên blog" 
                                        value="{{ old('name') }}" 
                                        required
                                    >
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="blog-description">Mô tả</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-comment"></i></span>
                                    <textarea 
                                        id="blog-description" 
                                        name="description" 
                                        class="form-control" 
                                        placeholder="Nhập mô tả blog"
                                        rows="3"
                                    >{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="blog-image">Ảnh</label>
                                <div class="input-group">
                                    <input 
                                        type="file" 
                                        id="blog-image" 
                                        name="image" 
                                        class="form-control" 
                                        accept="image/*"
                                    >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>     
</div>