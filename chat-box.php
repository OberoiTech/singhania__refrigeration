<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Chatbox</title>

<style>
/* ============================================================
   FLOATING BUTTON
============================================================ */
.chat-float-btn {
    width: 68px;
    height: 68px;
    background: linear-gradient(135deg,#0066ff,#0036d9);
    color: #fff;
    border-radius: 50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    cursor:pointer;
    position:fixed;
    bottom:25px;
    right:25px;
    z-index:99999;
    box-shadow:0 10px 25px rgba(0,0,0,0.28);
    transition:0.25s ease;
}

.chat-float-btn:hover {
    transform:scale(1.12) rotate(7deg);
}

/* ============================================================
   CHAT BOX WRAPPER
============================================================ */
#chat-box {
    width: 380px;
    height: 540px;
    background:#ffffff;
    position:fixed;
    bottom:110px;
    right:25px;
    border-radius:18px;
    box-shadow:0 25px 60px rgba(0,0,0,.30);
    display:none;
    flex-direction:column;
    overflow:hidden;
    animation:fadeUp .35s ease;
    z-index:99999;
}

@media only screen and (max-width: 480px) {

    #chat-box {
        width: 92% !important;
        height: 80vh !important;
        right: 50% !important;
        left: auto !important;
        transform: translateX(50%) !important;
        bottom: 20px !important;
        border-radius: 16px !important;
        z-index: 999999 !important;
    }

    .chat-float-btn {
        right: 20px !important;
        bottom: 20px !important;
        z-index: 99999999 !important
    }
}

/* Chat button always sabse upar */
.chat-float-btn {
    z-index: 214748364 !important;   /* max safe z-index */
}

/* Open chat box bhi sabse upar */
#chat-box {
    z-index: 2147483646 !important;   /* thoda kam, but still top */
}

/* Footer (input area) bhi safe side */
.chat-footer {
    z-index: 2147483647 !important;
}


@keyframes fadeUp {
    from { transform:translateY(40px); opacity:0; }
    to   { transform:translateY(0); opacity:1; }
}

/* ============================================================
   HEADER
============================================================ */
.chat-header {
    background:linear-gradient(135deg,#27a4ff,#0063d5);
    padding:18px;
    display:flex;
    align-items:center;
    gap:14px;
    color:white;
    position:relative;
}

.chat-header::after {
    content:"";
    position:absolute;
    bottom:-12px;
    left:0;
    width:100%;
    height:28px;
    background:linear-gradient(135deg,#27a4ff,#0063d5);
    border-bottom-left-radius:55%;
    border-bottom-right-radius:55%;
}

.agent-avatar {
    width:46px;
    height:46px;
    border-radius:50%;
    border:2px solid rgba(255,255,255,0.9);
}

.agent-info h4 {
    margin:0;
    font-size:16px;
    font-weight:700;
}
.agent-info p {
    margin:0;
    font-size:12px;
    opacity:0.92;
}

.close-chat {
    margin-left:auto;
    font-size:23px;
    cursor:pointer;
    color:white;
}

/* ============================================================
   CHAT BODY
============================================================ */
.chat-body {
    flex:1;
    padding:15px;
    overflow-y:auto;
    background:#eef4ff;
}

.chat-messages { margin:0; padding:0; }
.chat-messages li { list-style:none; margin-bottom:14px; }

/* Agent bubble */
.agent-msg {
    background:#fff;
    border:1px solid #dbe5ff;
    padding:12px 14px;
    border-radius:14px 14px 14px 4px;
    max-width:74%;
    font-size:14px;
    line-height:1.45;
    box-shadow:0 2px 6px rgba(0,0,0,0.08);
}

/* User bubble */
.user-msg {
    background:#cfe2ff;
    padding:12px 14px;
    border-radius:14px 14px 4px 14px;
    max-width:74%;
    margin-left:auto;
    font-size:14px;
    line-height:1.45;
    box-shadow:0 2px 6px rgba(0,0,0,0.08);
}

/* ============================================================
   SERVICE BUTTONS UI — CLEAN SINGLE COLUMN
============================================================ */
.service-grid {
    display:flex;
    flex-direction:column;
    gap:10px;
    margin-top:10px;
}

.service-btn {
    background:#0a61ff;
    color:white;
    padding:12px;
    border-radius:10px;
    text-align:center;
    cursor:pointer;
    font-size:15px;
    font-weight:600;
    transition:.2s;
    box-shadow:0 2px 8px rgba(0,0,0,0.12);
}

.service-btn:hover {
    background:#0049c7;
    transform:translateY(-2px);
}

/* ============================================================
   DETAILS FORM BUBBLE
============================================================ */
.form-bubble {
    background:#fff;
    padding:15px;
    border-radius:12px;
    border:1px solid #d0dcff;
    margin-top:10px;
}

.form-bubble input {
    width:100%;
    padding:12px 14px;
    margin-bottom:10px;
    font-size:15px;
    border-radius:10px;
    border:1px solid #b8c6ff;
    outline:none;
    font-family: "Segoe UI", sans-serif;
    transition:.2s;
}

.form-bubble input:focus {
    border-color:#0063d5;
    box-shadow:0 0 0 2px rgba(0,100,255,0.2);
}

.form-bubble button {
    width:100%;
    padding:12px;
    background:#0063d5;
    border:none;
    color:white;
    border-radius:10px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.2s;
}

.form-bubble button:hover {
    background:#004bb0;
}

/* ============================================================
   FOOTER INPUT
============================================================ */
.chat-footer {
    padding:12px;
    border-top:1px solid #d8e2ff;
    background:#fff;
    display:none;
}

.chat-input {
    width:80%;
    padding:10px 14px;
    border-radius:12px;
    border:1px solid #c7d6ff;
    background:#f8faff;
    font-size:15px;
}

.send-btn {
    position: relative;
    padding-left: 10px;
    font-size: 25px;
    color: #0062ff;
    cursor: pointer;
    top: 10px;
}

/* Typing Indicator */
.typing {
    font-size:12px;
    color:#666;
    margin-top:-8px;
    display:none;
}
#typingIndicator.is-visible { display:block; }
</style>

</head>
<body>

<!-- FLOAT BUTTON -->
<div class="chat-float-btn"><i class="fa fa-comments"></i></div>

<!-- CHAT BOX -->
<div id="chat-box">

    <div class="chat-header">
        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="agent-avatar" alt="Agent Bot">
        <div class="agent-info">
            <h4 id="agentName">Agent Bot</h4>       <!-- default / fallback -->
            <p id="agentRole"> Support Agent</p> <!-- default / fallback -->
        </div>
        <i class="fa fa-times close-chat"></i>
    </div>

    <div class="chat-body">
        <ul id="chatMessages" class="chat-messages"></ul>
        <div id="typingIndicator" class="typing">Aiden is typing...</div>
    </div>

    <div class="chat-footer" id="chatFooter">
        <input type="text" class="chat-input" placeholder="Type your message...">
        <i class="fa fa-paper-plane send-btn"></i>
    </div>

</div>


<script>
/* ============================================================
   GLOBAL CONFIG 
============================================================ */
const apiBase = "https://singhanialogistics.in/chatbox/api/";
const msgBox  = document.getElementById("chatMessages");
const chatBox = document.getElementById("chat-box");
const floatBtn = document.querySelector(".chat-float-btn");
const closeBtn = document.querySelector(".close-chat");
const typingIndicator = document.getElementById("typingIndicator");

let conversation_id = null;
let customerUniqId  = null;
let agentUniqId     = null;
let lastId          = 0;
let pollTimer       = null;
let welcome         = false;

/* ============================================================
   AUTO RESUME CHAT ON PAGE LOAD
============================================================ */
window.addEventListener("load", () => {
    autoResumeChat();
    loadAgent();  
});

function autoResumeChat() {
    let savedConv = localStorage.getItem("sl_conv_id") || "";

    fetch(apiBase + "resume-chat.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ conversation_id: savedConv })
    })
    .then(r => r.json())
    .then(data => {

        if (data.status !== 200 || !data.hasOpenChat) {
            localStorage.removeItem("sl_conv_id");
            localStorage.removeItem("sl_customer_id");
            localStorage.removeItem("sl_agent_id");
            return;
        }

        conversation_id = data.conversation_id;
        customerUniqId  = data.customerUniqId;
        agentUniqId     = data.agentUniqId;
        lastId          = data.lastId;

        localStorage.setItem("sl_conv_id", conversation_id);
        localStorage.setItem("sl_customer_id", customerUniqId);
        localStorage.setItem("sl_agent_id", agentUniqId);

        chatBox.style.display = "flex";
        document.getElementById("chatFooter").style.display = "flex";
        welcome = true;

        msgBox.innerHTML = "";

        data.messages.forEach(m => {
            if (m.sender_id === customerUniqId) appendUser(m.message);
            else appendAgent(m.message);
        });

        scrollToBottom();

        pollTimer = setInterval(fetchMessages, 5000);
    })
    .catch(() => {
        // Quiet fallback when the remote chat API is unavailable.
    });
}

/* ============================================================
   FLOAT BUTTON CLICK
============================================================ */
floatBtn.addEventListener("click", () => {

    chatBox.style.display = "flex";

    if (conversation_id) return;  

    if (!welcome) {
        welcomeMsg();
        setTimeout(() => {
            appendAgent("Please choose a service:");
            loadServices();
        }, 1000);
        welcome = true;
    }
});

/* CLOSE CHAT (UI hide only) */
closeBtn.addEventListener("click", () => chatBox.style.display = "none");

function loadAgent() {
    fetch(apiBase + "get-agent.php")
        .then(r => r.json())
        .then(data => {
            if (data.status === "ok") {
                const nameEl = document.getElementById("agentName");
                const roleEl = document.getElementById("agentRole");

                if (nameEl) nameEl.textContent = data.agent_name;

                // role agar static rakhna hai to yahi rehne do,
                // warna yahan custom text bhi bhej sakte ho
                if (roleEl && !roleEl.textContent.trim()) {
                    roleEl.textContent = "Support Agent";
                }
            }
        })
        .catch(() => {
            // Keep the default agent label/avatar when the API cannot be reached.
        });
}



/* ============================================================
   WELCOME TEXTS
============================================================ */
function welcomeMsg() {
    setTimeout(() => appendAgent("Welcome to Singhania Logistics 👋"), 300);
    setTimeout(() => appendAgent("I'm Aiden, your support assistant."), 900);
    setTimeout(() => appendAgent("How may I help you today?"), 1500);
}

/* ============================================================
   SERVICE LIST
============================================================ */
function loadServices() {
    fetch(apiBase + "fetch-services.php")
        .then(r => r.json())
        .then(data => {
            let html = `<div class='service-grid'>`;
            data.services.forEach(s => {
                html += `<div class="service-btn" onclick="selectService('${s}')">${s}</div>`;
            });
            html += `</div>`;
            appendAgent(html);
        })
        .catch(() => {
            appendAgent("Support is currently unavailable. Please try again later.");
        });
}

function selectService(service) {
    appendUser(service);
    appendAgent(`
        Please share your details:
        <div class="form-bubble">
            <input type="text" id="nameInput" placeholder="Full Name" />
            <input type="email" id="emailInput" placeholder="Email Address" />
            <input type="text" id="mobileInput" placeholder="Mobile Number" />
            <button onclick="submitDetails('${service}')">Submit Details</button>
        </div>
    `);
}

/* ============================================================
   SUBMIT CUSTOMER DETAILS (create new conversation)
============================================================ */
function submitDetails(serviceName) {

    let name = nameInput.value.trim();
    let email = emailInput.value.trim();
    let mobile = mobileInput.value.trim();

    if (!name || !email || !mobile) {
        alert("All fields required");
        return;
    }

    fetch(apiBase + "save-registration.php", {
        method: "POST",
        headers: {"Content-Type":"application/json"},
        body: JSON.stringify({name, email, mobile, service:serviceName})
    })
    .then(r => r.json())
    .then(data => {

        if (data.status !== 200) {
            alert("Error saving details");
            return;
        }

        customerUniqId  = data.customerUniqId;
        conversation_id = data.conversation_id;
        agentUniqId     = data.agentUniqId;

        localStorage.setItem("sl_conv_id", conversation_id);
        localStorage.setItem("sl_customer_id", customerUniqId);
        localStorage.setItem("sl_agent_id", agentUniqId);

        document.getElementById("chatFooter").style.display = "flex";

        appendAgent(`Thank you ${name} 🙏<br>Our support team will assist you shortly.`);

        pollTimer = setInterval(fetchMessages, 5000);
        scrollToBottom();
    })
    .catch(() => {
        alert("Unable to save your details right now. Please try again later.");
    });
}

/* ============================================================
   SEND USER MESSAGE
============================================================ */
document.querySelector(".send-btn").onclick = sendMessage;
document.querySelector(".chat-input").onkeyup = e => { if(e.key==="Enter") sendMessage(); };

function sendMessage() {

    let input = document.querySelector(".chat-input");
    let text = input.value.trim();
    if (!text) return;

    appendUser(text);
    input.value = "";

    fetch(apiBase + "save-message.php", {
        method: "POST",
        headers: {"Content-Type":"application/json"},
        body: JSON.stringify({
            conversation_id,
            message: text,
            sender_id: customerUniqId,
            receiver_id: agentUniqId
        })
    }).catch(() => {});
}

/* ============================================================
   FETCH NEW MESSAGES (only agent messages)
============================================================ */
function fetchMessages() {
    if (!conversation_id || !customerUniqId) return;

    fetch(`${apiBase}get-messages.php?conversation_id=${conversation_id}&last=${lastId}&customer_id=${customerUniqId}`)
        .then(r => r.json())
        .then(list => {

            if (list.length > 0) {
                typingIndicator.classList.add("is-visible");

                setTimeout(() => {
                    typingIndicator.classList.remove("is-visible");

                    list.forEach(m => {
                        appendAgent(m.message);
                        if (m.id > lastId) lastId = m.id;
                    });

                }, 600);
            }
        })
        .catch(() => {});
}

/* ============================================================
   UI HELPERS
============================================================ */
function appendUser(msg){
    msgBox.innerHTML += `<li><div class="user-msg">${msg}</div></li>`;
    scrollToBottom();
}

function appendAgent(msg){
    msgBox.innerHTML += `<li><div class="agent-msg">${msg}</div></li>`;
    scrollToBottom();
}

function scrollToBottom() {
    const body = document.querySelector(".chat-body");
    body.scrollTop = body.scrollHeight;
}
</script>


</body>
</html>
