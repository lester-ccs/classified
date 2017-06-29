@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($listings->count())

            {{--@foreach($listings as $listing)--}}
                {{--@include('listings.partials._listing_favourite', compact('listing'))--}}
            {{--@endforeach--}}
            @each('listings.partials._listing_favourite', $listings, 'listing')
            {{ $listings->links() }}
        @else
            <p>No favourites listings found.</p>
        @endif
    </div>
@endsection