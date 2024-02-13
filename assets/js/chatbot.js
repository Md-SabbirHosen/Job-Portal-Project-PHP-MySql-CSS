<<<<<<< HEAD
const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input .send-icon");
const voiceBtn = document.getElementById("voiceBtn");
const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
recognition.lang = "en-US";

recognition.onresult = function (event) {
  const transcript = event.results[0][0].transcript;
  chatInput.value = transcript;
};

voiceBtn.addEventListener("click", function () {
  recognition.start();
});

let userMessage = null;
const API_KEY = "YOUR_API_KEY";
const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
=======
const chatbotBtn = document.querySelector(".chatbot-btn");
const chatbotCloseBtn = document.querySelector(".close-btn");
const chatArea = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendBtn = document.querySelector(".chat-input span");

let messages = null;
const API_KEY = "";
const inputHeight = chatInput.scrollHeight;

const chatList = (message, className) => {
>>>>>>> 855222a9586480ae4177774b99d69f0ccaac4eff
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", className);
  let chatContent =
    className === "outgoing"
      ? "<p></p>"
<<<<<<< HEAD
      : '<span class="material-symbols-outlined icon"><i class="fa-regular fa-envelope"></i></span><p></p>';
=======
      : '<span class="icon"><i class="fa-regular fa-envelope"></i></span><p></p>';
>>>>>>> 855222a9586480ae4177774b99d69f0ccaac4eff
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};

const generateResponse = (chatElement) => {
  const API_URL = "https://api.openai.com/v1/chat/completions";
  const messageElement = chatElement.querySelector("p");

<<<<<<< HEAD
  const requestOptions = {
=======
  const formateOfRequest = {
>>>>>>> 855222a9586480ae4177774b99d69f0ccaac4eff
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Authorization: `Bearer ${API_KEY}`,
    },
    body: JSON.stringify({
      model: "gpt-3.5-turbo",
<<<<<<< HEAD
      messages: [{ role: "user", content: userMessage }],
    }),
  };

  const firebaseURL = "YOUR_FIREBASE_URL_WHERE_YOU_STORED_PREDEFINED_DATA";

  fetch(firebaseURL)
    .then((response) => response.json())
    .then((data) => {
      const lowercaseUserMessage = userMessage.toLowerCase();
      if (
        Object.keys(data).some((key) =>
          key.toLowerCase().includes(lowercaseUserMessage)
        )
      ) {
        const matchingKey = Object.keys(data).find((key) =>
          key.toLowerCase().includes(lowercaseUserMessage)
        );
        messageElement.textContent = data[matchingKey];
      } else {
        fetch(API_URL, requestOptions)
          .then((res) => res.json())
          .then((apiData) => {
            const apiResponse = apiData.choices[0].message.content.trim();
            messageElement.textContent = apiResponse;

            const firebaseStoreURL =
              "YOUR_FIREBASE_URL_WHERE_YOU_STORE_API_DATA";
            const storeRequestOptions = {
              method: "PATCH",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ [userMessage]: apiResponse }),
            };

            fetch(firebaseStoreURL, storeRequestOptions)
              .then((response) => response.json())
              .then((storeData) => {
                console.log("API response stored in Firebase:", storeData);
              })
              .catch((error) => {
                console.error("Error storing API response in Firebase:", error);
              });
            fetch(firebaseURL, storeRequestOptions)
              .then((response) => response.json())
              .then((storeData) => {
                console.log("API response stored in Firebase:", storeData);
              })
              .catch((error) => {
                console.error("Error storing API response in Firebase:", error);
              });
          })
          .catch(() => {
            messageElement.classList.add("error");
            messageElement.textContent =
              "Oops! Something went wrong with the OpenAI API. Please try again.";
          })
          .finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
      }
    })
    .catch(() => {
      messageElement.classList.add("error");
      messageElement.textContent = "Oops! Something went wrong ";
    })
    .finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
};

const handleChat = () => {
  userMessage = chatInput.value.trim().toLowerCase();
  if (!userMessage) return;

  chatInput.value = "";
  chatInput.style.height = `${inputInitHeight}px`;

  chatbox.appendChild(createChatLi(userMessage, "outgoing"));
  chatbox.scrollTo(0, chatbox.scrollHeight);

  setTimeout(() => {
    const incomingChatLi = createChatLi("Thinking...", "incoming");
    chatbox.appendChild(incomingChatLi);
    chatbox.scrollTo(0, chatbox.scrollHeight);
    generateResponse(incomingChatLi);
  }, 600);
};

chatInput.addEventListener("input", () => {
  chatInput.style.height = `${inputInitHeight}px`;
  chatInput.style.height = `${chatInput.scrollHeight}px`;
});

=======
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

>>>>>>> 855222a9586480ae4177774b99d69f0ccaac4eff
chatInput.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});
<<<<<<< HEAD

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () =>
  document.body.classList.remove("show-chatbot")
);
chatbotToggler.addEventListener("click", () =>
  document.body.classList.toggle("show-chatbot")
);
=======
>>>>>>> 855222a9586480ae4177774b99d69f0ccaac4eff
