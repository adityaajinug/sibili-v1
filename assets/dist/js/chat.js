const form = document.querySelector(".typing");
inputMessage = form.document.querySelector(".input-message");
sendBtn = form.document.querySelector("button");

sendBtn.onclick = () => {
  let ajax = new XMLHttpRequest();
  ajax.open("POST", "<?= base_url()?>kki/laporan/input_chat", true);
  ajax.onload = () => {
    if (ajax.readyState === XMLHttpRequest.DONE) {
      if (ajax.status === 200) {
        let data = ajax.response;
        console.log(data);
        if (data == "success") {
          location.href = "<?= base_url() ?>"
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    }
  }
  let formData = new FormData(form);
  ajax.send(formData);
}
