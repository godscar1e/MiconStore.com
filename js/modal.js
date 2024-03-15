document.addEventListener('DOMContentLoaded', function () {
    let loginLink = document.getElementById('loginLink');

    // Add event listener to the login link
    if (loginLink) {
        loginLink.addEventListener('click', function (event) {
            event.preventDefault();
            openModal();
        });
    }
});

let modal = document.getElementById('loginModal');
let overlay = document.getElementById('overlay');
let chatModal = document.getElementById('chatModal');
let chatModalButton = document.getElementById('chatModalButton');
let chatWindowOne = document.getElementById("chatWindowOne");
let chatWindowChat = document.getElementById("chatWindowChat");
let chatArrowBack = document.getElementById("chat__arrowback");

function openModal() {
    modal.style.display = 'block';
    overlay.style.display = 'block';

    setTimeout(() => {
        modal.classList.remove('closing');
        modal.classList.add('active');
        modal.style.visibility = 'visible';
    }, 50);
}

function closeModal() {
    modal.classList.remove('active');
    modal.classList.add('closing');
    overlay.style.display = 'none';
    chatModal.classList.remove('active');
    chatModal.classList.add('closing');

    setTimeout(() => {
        modal.style.visibility = 'hidden';
        modal.style.display = 'none';
        modal.classList.remove('closing');

        chatModal.style.visibility = 'hidden';
        chatModal.style.display = 'none';
        chatModal.classList.remove('closing');
        chatModalButton.classList.remove('hidden');

        if (chatModal.classList.contains('expanded')) {
            chatModal.classList.remove('expanded');
            chatWindowOne.style.display = 'block';
            chatWindowChat.style.display = 'none';
        }
    }, 300);
}

function openChatModal() {
    chatModal.style.display = 'block';
    overlay.style.display = 'block';
    overlay.style.background = 'none';
    chatModalButton.classList.add('hidden');

    setTimeout(() => {
        chatModal.classList.remove('closing');
        chatModal.classList.add('active');
        chatModal.style.visibility = 'visible';
    }, 50);
}

function expandChatModal() {
    chatModal.classList.toggle('expanded');
    chatWindowChat.style.display = 'block';
    chatWindowOne.style.display = 'none';

}

function decreaseChatModal() {
    chatModal.classList.remove('expanded');
    chatWindowChat.style.display = 'none';
    chatWindowOne.style.display = 'block';
}

function handleKeyDown(event) {
    // Check if the pressed key is Enter (key code 13)
    if (event.key === 'Enter') {
        // Prevent the default behavior of the Enter key (form submission)
        event.preventDefault();

        // Call the sendMessage function
        sendMessage();
    }
}

function sendMessage() {
    // Get the message input and main chat elements
    let messageInput = document.getElementById('messageInput');
    let mainChat = document.getElementById('mainChat');

    // Get the value of the message input
    let messageText = messageInput.value;

    // Check if the message is not empty
    if (messageText.trim() !== '') {
        // Create a new paragraph element to display the message
        let newMessage = document.createElement('p');
        newMessage.textContent = messageText;

        // Add the sender-message class to the messages you send
        newMessage.classList.add('sender-message');

        // Append the new message to the main chat
        mainChat.appendChild(newMessage);

        // Clear the message input after sending
        messageInput.value = '';
    }
}

