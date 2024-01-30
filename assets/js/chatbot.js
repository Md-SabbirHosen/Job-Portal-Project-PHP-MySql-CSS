const chatbotBtn = document.querySelector(".chatbot-btn");
const chatbotCloseBtn = document.querySelector(".close-btn");
const chatArea = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendBtn = document.querySelector(".chat-input span");

let messages = null;
const API_KEY = "";
const inputHeight = chatInput.scrollHeight;

const chatList = (message, className) => {
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", className);
  let chatContent =
    className === "outgoing"
      ? "<p></p>"
      : '<span class="icon"><i class="fa-regular fa-envelope"></i></span><p></p>';
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};

const generateResponse = (chatElement) => {
  const API_URL = "https://api.openai.com/v1/chat/completions";
  const messageElement = chatElement.querySelector("p");

  const formateOfRequest = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Authorization: `Bearer ${API_KEY}`,
    },
    body: JSON.stringify({
      model: "gpt-3.5-turbo",
      messages: [{ role: "user", content: messages }],
    }),
  };

  fetch(API_URL, formateOfRequest)
    .then((res) => res.json())
    .then((data) => {
      messageElement.textContent = data.choices[0].message.content.trim();
    })
    .catch(() => {
      messageElement.classList.add("error");
      messageElement.textContent =
        "Hello,user there might be some issues.Please Try Again!";
    })
    .finally(() => chatArea.scrollTo(0, chatArea.scrollHeight));
};

const handleChat = () => {
  messages = chatInput.value.trim();
  if (!messages) return;

  chatInput.value = "";
  chatInput.style.height = `${inputHeight}px`;

  chatArea.appendChild(chatList(messages, "outgoing"));
  chatArea.scrollTo(0, chatArea.scrollHeight);

  setTimeout(() => {
    const incomingChatLi = chatList("...", "incoming");
    chatArea.appendChild(incomingChatLi);
    chatArea.scrollTo(0, chatArea.scrollHeight);
    generateResponse(incomingChatLi);
  }, 100);
};

chatInput.addEventListener("input", () => {
  chatInput.style.height = `${inputHeight}px`;
  chatInput.style.height = `${chatInput.scrollHeight}px`;
});

sendBtn.addEventListener("click", handleChat);

chatbotBtn.addEventListener("click", () =>
  document.body.classList.toggle("show-chatbot")
);

chatbotCloseBtn.addEventListener("click", () =>
  document.body.classList.remove("show-chatbot")
);

chatInput.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});
