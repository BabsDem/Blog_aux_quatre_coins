const iconMenu = document.querySelector(".bars-menu");
const closeMenu = document.querySelector(".close-icon");
const menuItems = document.querySelector(".menu-items");

iconMenu.addEventListener("click", () => {
  console.log(iconMenu);
  closeMenu.classList.add("active");
  iconMenu.style.display = "none";
  menuItems.classList.add("active");
});
closeMenu.addEventListener("click", () => {
  closeMenu.classList.remove("active");
  iconMenu.style.display = "block";
  menuItems.classList.remove("active");
});
