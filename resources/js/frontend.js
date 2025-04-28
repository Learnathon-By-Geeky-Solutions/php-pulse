function formatDateTime(dateTimeString) {
    const options = {
        year: 'numeric',
        month: 'short',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit'
    };
    return new Intl.DateTimeFormat('en-US', options).format(new Date(dateTimeString));
}

function scrollToBottom() {
    let mainChatInbox = $('.wsus__chat_area_body');
    mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
}

if (typeof USER !== 'undefined') {
    window.Echo.private('message.' + USER.id).listen('MessageEvent', (e) => {
        console.log(e);

        let mainChatBox = $('.wsus__chat_area_body');
        let message = '';

        if (mainChatBox.attr('data-inbox') == e.sender_id) {
            message = `
                <div class="wsus__chat_single">
                    <div class="wsus__chat_single_img">
                        <img src="${e.sender_image}" alt="user" class="img-fluid">
                    </div>
                    <div class="wsus__chat_single_text">
                        <p>${e.message}</p>
                        <span>${formatDateTime(e.date_time)}</span>
                    </div>
                </div>`;
            
            mainChatBox.append(message);
            scrollToBottom();
        }

        // Add notification circle in profile
        $('.chat-user-profile').each(function () {
            let profileUserId = $(this).data('id');
            if (profileUserId == e.sender_id) {
                $(this).find('.wsus_chat_list_img').addClass('msg-notification');
            }
        });
    });
}
