const showContactsButton = document.getElementById('showContactsButton');
const closeContactsButton = document.getElementById('closeContactsButton');
const contactsContainer = document.getElementById('contactsContainer');
const contactList = document.getElementById('contactList');
const addContactButton = document.getElementById('addContactButton');
const chatbotContainer = document.getElementById('chatbotContainer');
const closeChatbotButton = document.getElementById('closeChatbotButton');

showContactsButton.addEventListener('click', () => {
  showContactsButton.style.display = 'none';
  contactsContainer.style.display = 'block';
  chatbotContainer.style.display = 'none';
});

closeContactsButton.addEventListener('click', () => {
  showContactsButton.style.display = 'block';
  contactsContainer.style.display = 'none';
});

contactList.addEventListener('click', (e) => {
  if (e.target.classList.contains('contact-button')) {
    toggleChat();
  }
});

closeChatbotButton.addEventListener('click', () => {
  chatbotContainer.style.display = 'none';
});

let chatVisible = false;

function toggleChat() {
    const chatBox = document.getElementById("chat-box");
    const chatButton = document.querySelector(".chat-button");

    chatVisible = !chatVisible;
    if (chatVisible) {
        chatBox.style.display = "block";
        chatButton.style.display = "none";
    } else {
        chatBox.style.display = "none";
        chatButton.style.display = "block";
    }
}

function addContact() {
    const contactName = prompt("Enter the name of the new contact:");
    if (contactName) {
      const contactList = document.getElementById("contactList");
      const newContact = document.createElement("li");
      newContact.classList.add("contact-button");
      newContact.textContent = contactName;
  
      // Insert the new contact at the top of the list
      const firstContact = contactList.firstChild;
      contactList.insertBefore(newContact, firstContact);
    }
  }
  
  // Attach the addContact function to the "Add Contact" button
  addContactButton.addEventListener("click", addContact);
  
function sendMessage() {
    const userInput = document.getElementById("user-input");
    const message = userInput.value;
    const chatContainer = document.getElementById("chat-container");
    const chatMessages = document.getElementById("chat-messages");
    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const amOrPm = hours >= 12 ? 'PM' : 'AM';
    const formattedHours = hours % 12 || 12;

    if (message) {
        const messageDiv = document.createElement("div");
        messageDiv.classList.add("chat-message");

        const timestampSpan = document.createElement("span");
        timestampSpan.classList.add("timestamp");
        timestampSpan.textContent = `${formattedHours}:${(minutes < 10 ? '0' : '')}${minutes} ${amOrPm}`;

        const messageParagraph = document.createElement("p");
        messageParagraph.textContent = message;

        messageDiv.appendChild(timestampSpan);
        messageDiv.appendChild(messageParagraph);

        chatMessages.appendChild(messageDiv);

        chatContainer.scrollTop = chatContainer.scrollHeight;

        userInput.value = "";
    }
}

const userInput = document.getElementById("user-input");
userInput.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        sendMessage();
        event.preventDefault(); // Prevent line break when Enter key is pressed
    }
});

