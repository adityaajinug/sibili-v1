// const form = document.querySelector(".typing"),
//   inputMessage = form.document.querySelector(".input-message"),
//   sendBtn = form.document.querySelector("button");

// form.onsubmit = (e) => {
//   e.preventDefault();
// }
// sendBtn.onclick = () => {
//   let ajax = new XMLHttpRequest();
//   ajax.open("POST", "<?= base_url()?>kki/laporan/input_chat", true);
//   ajax.onload = () => {
//     if (ajax.readyState === XMLHttpRequest.DONE) {
//       if (ajax.status === 200) {
//         inputMessage.value = "";
//         scrollToBottom();
//       }
//     }
//   }
//   let formData = new FormData(form);
//   ajax.send(formData);
// }

const chatBox = document.querySelector(".chat-box");
setInterval(() => {
  let ajax = new XMLHttpRequest();
  ajax.open("POST", "<?= base_url('kki/laporan/getChat') ?>", true);
  ajax.onload = () => {
    if (ajax.status === 200) {
      let data = ajax.response;
      chatBox.innerHTML = data;

    }
  }

  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("incoming_chat_id=" + incoming_chat_id);
}, 500);

