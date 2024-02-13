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
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", className);
  let chatContent =
    className === "outgoing"
      ? "<p></p>"
      : '<span class="material-symbols-outlined icon"><i class="fa-regular fa-envelope"></i></span><p></p>';
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};

const generateResponse = (chatElement) => {
  const API_URL = "https://api.openai.com/v1/chat/completions";
  const messageElement = chatElement.querySelector("p");

  const requestOptions = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Authorization: `Bearer ${API_KEY}`,
    },
    body: JSON.stringify({
      model: "gpt-3.5-turbo",
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

chatInput.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () =>
  document.body.classList.remove("show-chatbot")
);
chatbotToggler.addEventListener("click", () =>
  document.body.classList.toggle("show-chatbot")
);
