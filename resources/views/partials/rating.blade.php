Rating: <span class="text-yellow-400">
    @if ($book->rating >= 1)
        <i class="fa-solid fa-star"></i>
    @elseif ($book->rating >= 0.5)
        <i class="fa-solid fa-star-half-stroke"></i>
    @else
        <i class="fa-regular fa-star"></i>
    @endif

    @if ($book->rating >= 2)
        <i class="fa-solid fa-star"></i>
    @elseif ($book->rating >= 1.5)
        <i class="fa-solid fa-star-half-stroke"></i>
    @else
        <i class="fa-regular fa-star"></i>
    @endif

    @if ($book->rating >= 3)
        <i class="fa-solid fa-star"></i>
    @elseif ($book->rating >= 2.5)
        <i class="fa-solid fa-star-half-stroke"></i>
    @else
        <i class="fa-regular fa-star"></i>
    @endif

    @if ($book->rating >= 4)
        <i class="fa-solid fa-star"></i>
    @elseif ($book->rating >= 3.5)
        <i class="fa-solid fa-star-half-stroke"></i>
    @else
        <i class="fa-regular fa-star"></i>
    @endif

    @if ($book->rating >= 5)
        <i class="fa-solid fa-star"></i>
    @elseif ($book->rating >= 4.5)
        <i class="fa-solid fa-star-half-stroke"></i>
    @else
        <i class="fa-regular fa-star"></i>
    @endif
</span>
