<p>Hey {{ $listing->user->name }}!</p>

<p>{{ $sender->name }} has contacted you about your <a href="{{ route('listings.show', [$listing->area, $listing]) }}">{{ $listing->title }}</a> listing.</p>

<p>---</p>

<p>{!!  nl2br(e($body)) !!}</p>

<p>---</p>

<p>You can reply directly to this email to get back to {{ $sender->name }}</p>