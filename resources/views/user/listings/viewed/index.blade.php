@extends('layouts.app')

@section('content')
    <p>Showing you last {{ $indexLimit }} viewed listings.</p>
    @if ($listings->count())
        @each('listings.partials._listing', $listings, 'listing')
    @else
        <p>You have no viewed listing.</p>
    @endif
@endsection