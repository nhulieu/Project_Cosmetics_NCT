@foreach($product->reviews as $review)
    <div class="reviews-submitted">
        <div class="reviewer">{{$review->user->lname." ".$review->user->fname}} - <span>{{$review->created_at}}</span></div>
        <div class="ratting">
            @for ($i = 0; $i < $review->mark; $i++)
                <i class="fa fa-star"></i>
            @endfor
        </div>
        <p>
            {{$review->content}}
        </p>
    </div>
@endforeach
