@extends('admin.layouts.master')

@section('title', 'Chat with User')

@section('content')
<style>
    .admin-chat-area {
        background: #f5f5f5;
        padding: 30px 0;
        min-height: 100vh;
    }
    .admin-chatbox {
        background: #fff;
        border-radius: 0.3rem;
        max-width: 700px;
        margin: 8rem auto 0;
        width: 100%;
        height: fit-content;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        overflow: hidden;
    }
    .admin-msg-head {
        padding: 18px 24px;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .admin-msg-head img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
    }
    .admin-msg-head .info {
        flex: 1;
    }
    .admin-msg-head h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
    }
    .admin-msg-head span {
        font-size: 13px;
        color: #888;
    }
    .admin-msg-body {
        padding: 24px;
        height: 60vh;
        overflow-y: auto;
        background: #f9f9f9;
    }
    .admin-chat-message-list {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    .admin-message, .user-message {
        margin-bottom: 18px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .user-message {
        align-items: flex-start;
    }
    .msg-bubble {
        max-width: 70%;
        padding: 12px 18px;
        border-radius: 18px;
        font-size: 15px;
        background: #007bff;
        color: #fff;
        word-break: break-word;
        box-shadow: 0 1px 2px rgba(0,0,0,0.04);
    }
    .user-message .msg-bubble {
        background: #f5f5f5;
        color: #222;
    }
    .msg-media img, .msg-media video {
        max-width: 180px;
        border-radius: 10px;
        margin-bottom: 4px;
    }
    .msg-time {
        font-size: 11px;
        color: #888;
        margin-top: 4px;
        margin-left: 6px;
        margin-right: 6px;
    }
    .admin-chat-footer {
        border-top: 1px solid #eee;
        padding: 16px 24px;
        background: #fff;
    }
    .admin-chat-footer form {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .admin-chat-footer .form-control {
        flex: 1;
        border-radius: 20px;
        border: 1px solid #ccc;
        padding: 8px 16px;
        font-size: 15px;
    }
    .admin-chat-footer input[type="file"] {
        display: none;
    }
    .admin-chat-footer .btn {
        border-radius: 20px;
        padding: 8px 24px;
        font-size: 15px;
            width: 70px;
    }
    @media (max-width: 767px) {
        .admin-chatbox { max-width: 93%; }
        .admin-msg-body { padding: 10px; }
        .admin-chat-footer { padding: 10px; }
    }
</style>
<section class="nftmax-adashboard nftmax-show admin-chat-area">
    <div class="admin-chatbox">
        <div class="admin-msg-head">
            <img src="{{ $chat->user_data && $chat->user_data->profile_image ? asset('storage/' . $chat->user_data->profile_image) : 'https://i.pinimg.com/564x/d0/93/2b/d0932b3ed34581f4f811626a242c4ce3.jpg' }}" alt="User">
            <div class="info">
                <h4>Chat with {{ $chat->user_data->username ?? 'Anonymous' }}</h4>
                <span>{{ $chat->ip_address }} {{ $chat->location }}</span>
            </div>
        </div>
        <div class="admin-msg-body">
            <ul class="admin-chat-message-list" id="admin-chat-message-list">
                @foreach($messages as $msg)
                    <li class="{{ $msg->sender_type == 'admin' ? 'admin-message' : 'user-message' }}">
                        @if($msg->type === 'text')
                            <div class="msg-bubble">{{ $msg->body }}</div>
                        @elseif($msg->type === 'image')
                            <div class="msg-bubble msg-media"><img src="{{ $msg->media_url }}" alt="image"></div>
                        @elseif($msg->type === 'video')
                            <div class="msg-bubble msg-media"><video src="{{ $msg->media_url }}" controls></video></div>
                        @endif
                        <div class="msg-time"><small>{{ $msg->created_at->format('d-m H:i A') }}</small></div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="admin-chat-footer">
            <form id="admin-chat-send-form" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="chat_id" value="{{ $chat->chat_id }}">
                <input type="text" name="body" class="form-control" placeholder="Type your reply...">
                {{-- <label class="btn btn-light mb-0" style="padding:8px 12px;cursor:pointer;">
                    <i class="fa fa-paperclip"></i>
                    <input type="file" name="media" accept="image/*,video/*" class="form-control" style="display:none;">
                </label> --}}
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> </button>
            </form>
        </div>
    </div>
    <!-- Audio elements for tones -->
    <audio id="audio-receive" src="/assets/tone/recievie.mp3" preload="auto"></audio>
    <audio id="audio-sent" src="/assets/tone/sent.mp3" preload="auto"></audio>
</section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    let chat_id = "{{ $chat->chat_id }}";

    // Play audio helper
    function playAudio(id) {
        var audio = document.getElementById(id);
        if (audio) {
            audio.currentTime = 0;
            audio.play();
        }
    }

    // Send message
    $('#admin-chat-send-form').on('submit', function(e) {
        e.preventDefault();
        let body = $.trim($(this).find('input[name="body"]').val());
        let file = $(this).find('input[name="media"]').val();
        if (!body && !file) {
            // Prevent sending if both text and file are empty
            return;
        }
        let formData = new FormData(this);
        formData.append('chat_id', chat_id);
        formData.append('senderType', 'admin');

        let btn = $(this).find('button');
        let btn_txt = btn.html();
        btn.html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

        $.ajax({
            url: '/admin/support-send-message',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status !== 1) {
                    alert('Failed to send message.');
                    return;
                }
                // Play sent tone
                playAudio('audio-sent');
                // Do NOT appendMessage here, wait for Pusher event
                $('#admin-chat-send-form')[0].reset();
            },
            error: function(xhr) {
                alert('Error sending message');
            },
            complete: function() {
                btn.html(btn_txt).prop('disabled', false);
            }
        });
    });

    // Pusher real-time
    function subscribePusher() {
        Pusher.logToConsole = false;
        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });
        var channel = pusher.subscribe('chat.' + chat_id);
        
        // Listen for new messages
        channel.bind('App\\Events\\MessageSentEvent', function(data) {
            appendMessage(data.message);
            // Play receive tone if message is from user/guest (other side)
            if (data.message.sender_type === 'user' || data.message.sender_type === 'guest') {
                playAudio('audio-receive');
                // Mark new user messages as read since admin is viewing the chat
                markMessagesAsRead();
            }
        });

        // Listen for message read events
        channel.bind('App\\Events\\MessageReadEvent', function(data) {
            // Handle read receipts if needed (e.g., show checkmarks)
            console.log('Messages marked as read by: ' + data.reader_type);
        });
    }

    // Function to mark messages as read when admin is actively viewing
    function markMessagesAsRead() {
        $.post('/admin/mark-messages-read', {
            chat_id: {{ $chat->id }}
        }, function(response) {
            // Messages marked as read
        }).fail(function() {
            console.log('Failed to mark messages as read');
        });
    }

    $(document).ready(function() {
        $('.admin-msg-body').scrollTop($('.admin-msg-body')[0].scrollHeight);
        subscribePusher();
        
        // Mark messages as read when admin opens the chat
        markMessagesAsRead();
        
        // Mark messages as read when admin focuses on the page
        $(window).focus(function() {
            markMessagesAsRead();
        });
    });

    // Append message to chat
    function appendMessage(msg, clear = false) {
        let cls = msg.sender_type == 'admin' ? 'admin-message' : 'user-message';
        let html = '';
        if (msg.type === 'text')
            html = `<li class="${cls}"><div class="msg-bubble">${msg.body}</div><div class="msg-time"><small>${moment(msg.created_at).format('D-M h:mm A')}</small></div></li>`;
        if (msg.type === 'image')
            html = `<li class="${cls}"><div class="msg-bubble msg-media"><img src="${msg.media_url}" alt="image"></div><div class="msg-time"><small>${moment(msg.created_at).format('D-M h:mm A')}</small></div></li>`;
        if (msg.type === 'video')
            html = `<li class="${cls}"><div class="msg-bubble msg-media"><video src="${msg.media_url}" controls></video></div><div class="msg-time"><small>${moment(msg.created_at).format('D-M h:mm A')}</small></div></li>`;
        $('#admin-chat-message-list').append(html);
        $('.admin-msg-body').scrollTop($('.admin-msg-body')[0].scrollHeight);
    }

    // Scroll to bottom on load
    $(document).ready(function() {
        $('.admin-msg-body').scrollTop($('.admin-msg-body')[0].scrollHeight);
    });
</script>
@endsection

