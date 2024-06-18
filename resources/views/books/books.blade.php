@extends('layout.main')

@section('content')
    <h1 class="mb-10 text-2xl">Books</h1>

    <form method="GET" action="{{ route('books') }}" class="mb-5 flex items-center space-x-2">
        <input class="input" type="text" name="title" placeholder="Enter Book title or Author Name "
            value="{{ request('title') }}">
        <input type="hidden" name="filter" value="{{ request('filter') }}">
        <button type="submit" class="btn h-10">Search</button>
        <a class="btn h-10" href="{{ route('books') }}">Clear</a>
    </form>

    <div class="filter-container mb-4 flex">
        @php
            $filters = [
                '' => Str::upper('latest books'),
                'Top_Reviews_Books' => Str::upper('top reviews books'),
                'Top_Rated_Books' => Str::upper('top rated books'),
            ];
            $filter_input = request('filter');
        @endphp

        @foreach ($filters as $key => $label)
            <a href="{{ route('books', [...request()->query(), 'filter' => $key]) }}"
                class="{{ $filter_input === $key || ($filter_input === null && $key === '') ? 'filter-item-active' : 'filter-item' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>


    <ul>
        @forelse ($books as $book)
            <li class="mb-4">
                <div class="book-item">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="w-full flex-grow sm:w-auto">
                            <a href="{{route('Book_Details', $book->id)}}" class="book-title">{{ $book->title }}</a>
                            <span class="book-author">by {{ $book->auther }}</span>
                        </div>
                        <div>
                            <div class="book-rating">
                                {{ number_format($book->review_avg_rating, 1) }}
                            </div>
                            <div class="book-review-count">
                                out of {{ $book->review_count }} {{ Str::plural('review', $book->reviews_count) }}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li class="mb-4">
                <div class="empty-book-item">
                    <p class="empty-text">No books found</p>
                    <a href="{{ route('books') }}" class="reset-link">Reset criteria</a>
                </div>
            </li>
        @endforelse
    </ul>
@endsection
