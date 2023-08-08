const payement = document.querySelector("#payement");
payement.addEventListener("click", function (event) {
  const idAppro = document.querySelector("#id_appro");
  idAppro.value = payement.getAttribute("data-appro");
});
