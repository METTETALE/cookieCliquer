let nbCookie = parseInt(sessionStorage.getItem("nbCookie"), 10);

if (isNaN(nbCookie)) {
  nbCookie = 0;
}

let nbCookiePerClick = parseInt(sessionStorage.getItem("nbCookiePerClick"), 10);

if (isNaN(nbCookiePerClick)) {
  nbCookiePerClick = 1;
}

const cookie = document.querySelector("#cookie");
const compteur = document.querySelector("#compteur");
const textCompteur = compteur.textContent;

compteur.textContent = textCompteur + nbCookie;

cookie.addEventListener("click", () => {
  nbCookie = nbCookie + nbCookiePerClick; // Ensure nbCookie and nbCookiePerClick are integers
  compteur.textContent = textCompteur + nbCookie;
  sessionStorage.setItem("nbCookie", nbCookie);
});

let upgradeToRemove = sessionStorage.getItem("upgrades");

if (!upgradeToRemove) {
  upgradeToRemove = [];
} else {
  upgradeToRemove = JSON.parse(upgradeToRemove);
}

console.log(upgradeToRemove);

upgradeToRemove.forEach((upgrade) => {
  document.querySelector(`#${upgrade}`).remove();
});

let upgrades = document.querySelectorAll("button.upgrade");

Array.from(upgrades).forEach((upgrade) => {
  upgrade.addEventListener("click", () => {
    const values = upgrade.getAttribute("val").split(":");
    if (nbCookie >= upgrade.value) {
      console.log(values);

      nbCookie -= values[0];
      nbCookiePerClick =
        (nbCookiePerClick + parseInt(values[1], 10)) * parseInt(values[2], 10);
      upgrade.remove();
      compteur.textContent = textCompteur + nbCookie;
      sessionStorage.setItem("nbCookiePerClick", nbCookiePerClick);
      let upgradesArray = JSON.parse(sessionStorage.getItem("upgrades")) || [];
      upgradesArray.push(upgrade.id);
      sessionStorage.setItem("upgrades", JSON.stringify(upgradesArray));
    }
  });
});
