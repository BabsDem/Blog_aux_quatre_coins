const input = document.getElementById("profile_img");
input.addEventListener("change", () => {
  console.log("chagmt");
  let element = document.createElement("span");
  element.innerText = "Votre image a bien été sélectionnée";
  console.log(element);
  console.log(input.parentNode);
  input.parentNode.append(element);
});
