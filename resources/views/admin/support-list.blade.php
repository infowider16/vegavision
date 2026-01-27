@extends('admin.layouts.master')



@section('title', 'Support List')



@section('content')



<style>
    .avatar {

        width: 45px;

        border-radius: 50px;

        height: 45px;

        object-fit: cover;

        object-position: top;

    }

    .card {
        max-width: 700px;
        margin: auto;
    }

    .chat-session-item {

        cursor: pointer;

        transition: all 0.3s ease;

    }

    .chat-session-item:hover {

        background-color: #f8f9fa;

    }

    span.badge.bg-danger.unread-badge {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .d-flex {
        display: flex !important;
    }

    a.d-flex.gap-3 {
        max-width: 90%;
    }
</style>



<section class="nftmax-adashboard nftmax-show">

    <div class="nftmax-adashboard-left">



        <div class="admin-status-toggle">

            {{-- <label>

                    <input type="checkbox" id="admin-online-toggle" {{ $adminOnline ? 'checked' : '' }}>

            <span>{{ $adminOnline ? 'Online' : 'Offline' }}</span>

            </label> --}}

        </div>





        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                        <h3>Active Chats</h3>

                    <div class="col-lg-6">
                          <input type="text" id="search-chat-user" name="name" class="form-control" placeholder="Search by chat user">
                    </div>
                    </div>

                    <ul class="list-group" id="chat-session-list">

                        @foreach ($chats as $chat)

                        <!-- Example: -->

                        <li class="list-group-item chat-session-item " data-chat-id="{{ $chat->id }}" data-last-message="{{ $chat->last_message_at ? $chat->last_message_at->timestamp : 0 }}" data-username="{{ strtolower($chat->user_data->username ?? 'anonymous') }}" data-location="{{ strtolower($chat->ip_address . ' ' . $chat->location) }}">

                            <a href="{{ route('admin.support-chat', ['chat_id' => $chat->id]) }}" class="d-flex gap-3">

                                <img src="{{ $chat->user_data ? asset('storage/' . $chat->user_data->profile_image) : 'https://i.pinimg.com/564x/d0/93/2b/d0932b3ed34581f4f811626a242c4ce3.jpg' }}"

                                    class="avatar">

                                <div>
                                    <p>{{ $chat->user_data->username ?? 'Anonymous' }}</p>



                                    <small class="text-muted">{{ $chat->ip_address }} {{ $chat->location }}</small>
                                </div>
                            </a>

                            @if($chat->unread_count > 0)

                            <span class="badge bg-danger unread-badge" style="float: right; font-size: 15px">{{ $chat->unread_count }}</span>

                            @else

                            <span class="badge bg-danger unread-badge" style="float: right; font-size: 15px; display:none;">0</span>

                            @endif

                        </li>

                        @endforeach

                    </ul>

                    <!-- No results message -->
                    <div id="no-results-message" class="text-center mt-4" style="display: none;">
                        <p class="text-muted">No chats found matching your search.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>



@endsection



@section('scripts')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Search functionality
    $('#search-chat-user').on('input', function() {
        const searchTerm = $(this).val().toLowerCase().trim();
        const $chatItems = $('.chat-session-item');
        let visibleCount = 0;

        if (searchTerm === '') {
            // Show all items if search is empty
            $chatItems.show();
            visibleCount = $chatItems.length;
        } else {
            // Filter items based on search term
            $chatItems.each(function() {
                const $item = $(this);
                const username = $item.data('username') || '';
                const location = $item.data('location') || '';
                
                // Check if search term matches username or location
                if (username.includes(searchTerm) || location.includes(searchTerm)) {
                    $item.show();
                    visibleCount++;
                } else {
                    $item.hide();
                }
            });
        }

        // Show/hide no results message
        if (visibleCount === 0) {
            $('#no-results-message').show();
        } else {
            $('#no-results-message').hide();
        }
    });

    // Clear search on escape key
    $('#search-chat-user').on('keydown', function(e) {
        if (e.key === 'Escape') {
            $(this).val('');
            $('.chat-session-item').show();
            $('#no-results-message').hide();
        }
    });

    $('.chat-session-link').on('click', function() {
        let chatUid = $(this).data('chat-uid');
        $.get('/admin/chat/' + chatUid, function(res) {
            $('#admin-chat-window').html(res);
        });
    });

    $('#admin-online-toggle').on('change', function() {
        $.post('/admin/toggle-online', {
            online: $(this).is(':checked')
        }, function(res) {
            alert('Admin is now ' + (res.online ? 'Online' : 'Offline'));
        });
    });

    // Function to reorder chat list
    function reorderChatList() {
        let $list = $('#chat-session-list');
        let $items = $list.children('.chat-session-item');

        $items.sort(function(a, b) {
            let timeA = parseInt($(a).data('last-message')) || 0;
            let timeB = parseInt($(b).data('last-message')) || 0;
            return timeB - timeA; // Descending order (newest first)
        });

        $list.empty().append($items);
    }

    // Function to update or create chat item
    function updateChatItem(chatData) {
        console.log('Updating chat item:', chatData); // Debug log
        
        let $existingItem = $('.chat-session-item[data-chat-id="' + chatData.id + '"]');
        let currentTimestamp = Math.floor(new Date().getTime() / 1000);

        if ($existingItem.length) {
            console.log('Found existing item, updating...'); // Debug log
            
            // Update existing item timestamp
            $existingItem.attr('data-last-message', currentTimestamp);

            // Update unread count if message is from user/guest
            if (chatData.sender_type === 'user' || chatData.sender_type === 'guest') {
                let $badge = $existingItem.find('.unread-badge');
                let currentCount = parseInt($badge.text()) || 0;
                let newCount = currentCount + 1;
                
                console.log('Updating badge from', currentCount, 'to', newCount); // Debug log
                
                $badge.text(newCount);
                $badge.show();
                $badge.css('display', 'inline-block'); // Force show
            }
        } else {
            console.log('Creating new chat item...'); // Debug log
            
            // Create new chat item if it doesn't exist
            let avatarSrc = chatData.user_data && chatData.user_data.profile_image 
                ? '/storage/' + chatData.user_data.profile_image 
                : 'https://i.pinimg.com/564x/d0/93/2b/d0932b3ed34581f4f811626a242c4ce3.jpg';

            let username = chatData.user_data ? chatData.user_data.username : 'Anonymous';
            let location = (chatData.ip_address || '') + ' ' + (chatData.location || '');
            let unreadCount = (chatData.sender_type === 'user' || chatData.sender_type === 'guest') ? 1 : 0;
            let badgeDisplay = unreadCount > 0 ? 'inline-block' : 'none';

            let newItem = `
                <li class="list-group-item chat-session-item" data-chat-id="${chatData.id}" data-last-message="${currentTimestamp}" data-username="${username.toLowerCase()}" data-location="${location.toLowerCase()}">
                    <a href="/admin/support-chat/${chatData.id}" class="d-flex gap-3">
                        <img src="${avatarSrc}" class="avatar">
                        <div>
                            <p>${username}</p>
                            <small class="text-muted">${location}</small>
                        </div>
                    </a>
                    <span class="badge bg-danger unread-badge" style="float: right; font-size: 15px; display: ${badgeDisplay};">${unreadCount}</span>
                </li>
            `;

            $('#chat-session-list').prepend(newItem);
            
            // Re-apply search filter if there's an active search
            const currentSearch = $('#search-chat-user').val().toLowerCase().trim();
            if (currentSearch !== '') {
                const $newItem = $('.chat-session-item[data-chat-id="' + chatData.id + '"]');
                const itemUsername = $newItem.data('username') || '';
                const itemLocation = $newItem.data('location') || '';
                
                if (!itemUsername.includes(currentSearch) && !itemLocation.includes(currentSearch)) {
                    $newItem.hide();
                }
            }
        }

        // Reorder the list
        reorderChatList();
    }

    // Initialize Pusher when document is ready
    $(document).ready(function() {
        console.log('Initializing Pusher for support list...'); // Debug log
        
        // Pusher real-time for unread badge and chat ordering
        Pusher.logToConsole = true; // Enable for debugging
        
        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        console.log('Pusher initialized with key:', '{{ env('PUSHER_APP_KEY') }}'); // Debug log

        var channel = pusher.subscribe('admin-support');
        
        console.log('Subscribed to admin-support channel'); // Debug log

        // Handle connection events
        pusher.connection.bind('connected', function() {
            console.log('Pusher connected successfully');
        });

        pusher.connection.bind('error', function(err) {
            console.log('Pusher connection error:', err);
        });

        // Listen for message read events
        channel.bind('App\\Events\\MessageReadEvent', function(data) {
            console.log('MessageReadEvent received:', data); // Debug log
            
            if (data.reader_type === 'admin') {
                var chatId = data.chat_id;
                var $item = $('.chat-session-item[data-chat-id="' + chatId + '"]');
                
                console.log('Hiding badge for chat:', chatId); // Debug log
                
                $item.find('.unread-badge').text('0').hide();
            }
        });

        // Listen for new messages
        channel.bind('App\\Events\\MessageSentEvent', function(data) {
            console.log('MessageSentEvent received:', data); // Debug log
            
            if (data.chat && data.message) {
                updateChatItem({
                    id: data.chat.id,
                    chat_id: data.chat.chat_id,
                    user_data: data.chat.user_data,
                    ip_address: data.chat.ip_address,
                    location: data.chat.location,
                    sender_type: data.sender_type
                });
            }
        });
    });
</script>
@endsection