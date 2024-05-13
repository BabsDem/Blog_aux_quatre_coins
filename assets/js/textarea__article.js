// Article formulaire pour poster un commentaire
let textarea = document.querySelector(".textarea-comment");
let label = document.querySelector(".label-textarea");

textarea.addEventListener("focus", function () {
  label.style.transform = "translateY(-80px)";
  // L'utilisateur sort du textarea, celui-ci n'est donc plus en focus
  textarea.addEventListener("blur", function () {
    if (textarea.value === "") {
      label.style.transform = "translateY(0px)";
    }
  });
});
