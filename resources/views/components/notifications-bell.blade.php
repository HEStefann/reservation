<div>
    <!-- Notification bell icon -->
    <i class="fas fa-bell"></i>

    <!-- Display the count of unread notifications -->
    <span class="badge">{{ $notifications->count() }}</span>

    <!-- Dropdown menu with notifications -->
    <div class="dropdown-menu">
        @foreach($notifications as $notification)
            <div class="dropdown-item">
                <span>{{ $notification->data['message'] }}</span>
                <small>{{ $notification->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>
</div>
