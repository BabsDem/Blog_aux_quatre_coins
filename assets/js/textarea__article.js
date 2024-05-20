//Carroussel
const buttons = document.querySelectorAll(".btn-carroussel");
const carroussel = document.querySelector(".carroussel");
const li = carroussel.querySelectorAll("li");

// Ajout d'un évènement sur chaque bouton pour passer à l'image suivante ou précédente
buttons.forEach((btn) => {
  btn.addEventListener("click", () => {
    const currentBtn =
      btn.closest("button").getAttribute("id") === "next" ? 1 : -1;
    const liActive = document.querySelector(".active");
    let newIndex = currentBtn + [...li].indexOf(liActive);

    if (newIndex < 0) newIndex = [...li].length - 1;
    if (newIndex >= [...li].length) newIndex = 0;

    li[newIndex].classList.add("active");
    liActive.classList.remove("active");
  });
});

// Poster un commentaire
let textarea = document.querySelector(".textarea-comment");
let label = document.querySelector(".label-textarea");

// Ajout d'un évènement sur le textearea pour ajouter une translation
textarea.addEventListener("focus", function () {
  label.style.transform = "translateY(-80px)";
  // L'utilisateur sort du textarea, celui-ci n'est donc plus en focus
  textarea.addEventListener("blur", function () {
    if (textarea.value === "") {
      label.style.transform = "translateY(0px)";
    }
  });
});
