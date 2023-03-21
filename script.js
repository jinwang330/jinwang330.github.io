const messageForm = document.getElementById('message-form');
const messageInput = document.getElementById('message-input');
const chatBox = document.getElementById('chat-box');

messageForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const message = messageInput.value.trim();
  if (message) {
    const newMessage = document.createElement('div');
    newMessage.innerText = message;
    chatBox.appendChild(newMessage);
    messageInput.value = '';
    chatBox.scrollTop = chatBox.scrollHeight;
  }
});


function initChatbot() {
    const chatbot = document.querySelector('df-messenger');
    chatbot.addEventListener('df-response-received', (event) => {
        const message = event.detail.response.queryResult.fulfillmentText;
        // Do something with the response message
    });
}
