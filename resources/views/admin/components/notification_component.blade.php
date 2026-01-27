@if($notifications->isNotEmpty())
@foreach ($notifications as $notification)
<li class="menu-item {{ $notification->is_read == 0 ? 'unread' : '' }}"><a href="{{ route('admin.property.Detail', ['id' => $notification->property_id, 'notification_id' => $notification->id]) }}">
        <p class="mb-1">{{$notification->body}}
        </p>
        <span>{{ \Carbon\Carbon::parse($notification->created_at)->format('d F Y') }}</span>
    </a>
</li>
<li>
    <hr class="dropdown-divider">
</li>
@endforeach
@else
<li class="menu-item">
    <p class="text-danger text-center">No notifications found.</p>
</li>
@endif