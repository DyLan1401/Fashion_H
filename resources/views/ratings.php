{{-- filepath: resources/views/reviews/index.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đánh giá sản phẩm</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    
  </style>
</head>
<body>
  <div class="tabs">
    <button class="tab active">REVIEWS</button>
  </div>

  <div class="review-section" id="reviewSection">
    <h3 id="reviewCount">{{ $reviews->count() }} lượt đánh giá</h3>

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
      <div style="color:green; margin-bottom:15px;">{{ session('success') }}</div>
    @endif

    {{-- Hiển thị danh sách đánh giá --}}
    @foreach($reviews as $review)
      <div class="review-item">
        <img src="{{ $review->avatar ?? 'https://randomuser.me/api/portraits/lego/0.jpg' }}" alt="user">
        <div class="review-content">
          <strong>{{ $review->name }} – {{ $review->created_at->format('d/m/Y') }}</strong>
          <div class="review-stars">
            {!! str_repeat('★', $review->rating) !!}{!! str_repeat('☆', 5 - $review->rating) !!}
          </div>
          <p>{{ $review->content }}</p>
        </div>
      </div>
    @endforeach

    <p>Đánh giá của bạn:</p>
    <div class="rating-input" id="ratingStars">
      @for($i=1;$i<=5;$i++)
        <i class="fa-regular fa-star" data-value="{{ $i }}"></i>
      @endfor
    </div>
    <form id="reviewForm" method="POST" action="{{ route('reviews.store') }}">
      @csrf
      <input type="hidden" name="rating" id="ratingInput" value="0">
      <textarea name="content" placeholder="Nội dung đánh giá" required>{{ old('content') }}</textarea>
      <div class="row">
        <input type="text" name="name" placeholder="Họ và tên" value="{{ old('name') }}" required>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
      </div>
      <button type="submit">Thêm đánh giá của bạn</button>
    </form>
    @if($errors->any())
      <div style="color:red; margin-top:10px;">
        @foreach($errors->all() as $err)
          <div>{{ $err }}</div>
        @endforeach
      </div>
    @endif
  </div>

  <script>
    let selectedRating = 0;
    const stars = document.querySelectorAll("#ratingStars i");
    const ratingInput = document.getElementById("ratingInput");

    stars.forEach(star => {
      star.addEventListener("click", () => {
        selectedRating = parseInt(star.dataset.value);
        ratingInput.value = selectedRating;
        stars.forEach(s => s.classList.remove("selected"));
        for (let i = 0; i < selectedRating; i++) {
          stars[i].classList.add("selected");
        }
      });
    });

    // Giữ lại rating khi validate lỗi
    @if(old('rating'))
      selectedRating = {{ old('rating') }};
      ratingInput.value = selectedRating;
      for (let i = 0; i < selectedRating; i++) {
        stars[i].classList.add("selected");
      }
    @endif
  </script>
</body>
</html>