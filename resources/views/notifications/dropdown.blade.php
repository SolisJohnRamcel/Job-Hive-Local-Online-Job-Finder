<div class="d-flex justify-content-end mt-3">
    <div class="position-relative">
        <button class="btn btn-light position-relative" id="notificationBell" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell-fill" style="font-size: 1.5rem;"></i>
            <span id="notificationCount"
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                style="font-size: 0.8rem; display: {{ $notifications->where('is_read', 0)->isEmpty() ? 'none' : 'inline' }}">
                {{ $notifications->count() }}
            </span>
        </button>

        <!-- Dropdown -->
        <ul class="dropdown-menu dropdown-menu-end" id="notificationList" style="width: 300px; max-height: 300px; overflow-y: auto;">
            <li class="dropdown-header text-center fw-bold">Notifications</li>
            @forelse ($notifications as $notification)
                <li class="dropdown-item {{ $notification->is_read ? 'bg-light' : '' }}" data-notification-id="{{ $notification->id }}" onclick="markAsRead(this)">
                    {{ $notification->message }}
                    <small class="text-muted d-block">{{ $notification->created_at->diffForHumans() }}</small>
                </li>
            @empty
                <li class="text-center text-muted">No notifications</li>
            @endforelse
        </ul>
    </div>
</div>

<script>
 function markAsRead(notificationItem) {
    const notificationId = notificationItem.getAttribute('data-notification-id');
    const notificationCount = document.getElementById('notificationCount');

    console.log('Marking notification as read:', notificationId); // Debug log

    fetch(`/mark-notification-as-read/${notificationId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Data received:', data); // Debug log

        if (data.success) {
            notificationItem.classList.add('bg-light');
            const currentCount = parseInt(notificationCount.textContent);
            const newCount = currentCount - 1;

            if (newCount <= 0) {
                notificationCount.style.display = 'none';
            } else {
                notificationCount.textContent = newCount;
            }
        } else {
            alert('Failed to mark notification as read');
        }
    })
    .catch(error => {
        console.error('Error:', error); // Error logging
        alert('Failed to mark notification as read');
    });
}




</script>
