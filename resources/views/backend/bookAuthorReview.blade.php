<!DOCTYPE html>
<html>
<head>
    <title>Authors, Books, and Reviews</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .author { margin-bottom: 40px; }
        .book { margin-left: 20px; }
        .review { margin-left: 40px; font-style: italic; }
    </style>
</head>
<body>
    <h1>Author → Book → Review</h1>

    @foreach ($authors as $author)
        <div class="author">
            <h2>Author: {{ $author->name }}</h2>

            @foreach ($author->books as $book)
                <div class="book">
                    <h4>📚 Book: {{ $book->title }}</h4>
                    <p>{{ $book->description }}</p>

                    @foreach ($book->reviews as $review)
                        <div class="review">
                            <p>📝 {{ $review->content }} (Rating: {{ $review->rating }}/5)</p>
                            <p>👤 Reviewed by: {{ $review->user->name }}</p>
                        </div>
                    @endforeach

                    @if($book->reviews->isEmpty())
                        <div class="review">No reviews yet.</div>
                    @endif
                </div>
            @endforeach

            @if($author->books->isEmpty())
                <p>No books found for this author.</p>
            @endif
        </div>
    @endforeach
</body>
</html>
