@extends('layouts.app')

@section('content')
    @if ($listings->count())
        {{--@foreach($listings as $listing)--}}
        {{--@include('listings.partials._listing_favourite', compact('listing'))--}}
        {{--@endforeach--}}
        @each('listings.partials._listing_own   ', $listings, 'listing')
        {{ $listings->links() }}
    @else
        <p>No published listings.</p>
    @endif
@endsection