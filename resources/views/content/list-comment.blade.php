<ul style="list-style: none" class="comment" id="comment-content">
    @foreach ($reviews as $review )
        <li>
            <div class="single-comment-area d-flex">
                <div class="author-img">
                    <img style="border-radius: 50%" width="50px" src="{{ $review->avatar ? ''.Storage::url($review->avatar) : '' }}" alt="avt-user">
                </div>
                <div class="comment-content ml-3">
                    <div class="author-name-deg">
                        <h6>{{ $review->full_name }}</h6>
                        <span>{{ $review->created_at }}</span>
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
<div class="load-moer-btn">
    <a class="primary-btn3" href="#">Load More Question</a>
</div>
