const loby = document.getElementById("loby");
const cerrar = document.getElementById("cerrar");
const nad = document.getElementById("nad");
const ent = document.getElementById("ent");
const pis = document.getElementById("pis");
const eq = document.getElementById("eq");

const content = document.getElementById("content");
const galeria = document.getElementById("galeria");

let exit = false;

loby.addEventListener("change", function () {
  const option1 = loby.value;
  if (option1 == "principal") {
    galeria.classList.add("hidden");
    content.classList.remove("hidden");
  } else if (option1 == "galeria") {
    content.classList.add("hidden");
    galeria.classList.remove("hidden");
  }
});

cerrar.addEventListener("click", function () {
  console.log(exit);
  if (exit) {
    exit = false;
    loby.classList.add("hidden");
    nad.classList.add("hidden");
    ent.classList.add("hidden");
    pis.classList.add("hidden");
    eq.classList.add("hidden");
  } else {
    exit = true;
    loby.classList.remove("hidden");
    nad.classList.remove("hidden");
    ent.classList.remove("hidden");
    pis.classList.remove("hidden");
    eq.classList.remove("hidden");
  }
});

nad.addEventListener("change", function () {
  const option2 = nad.value;
  if (option2 == "consulta1") {
    location.href = "./php/nad/consulta.php";
  } else if (option2 == "altas1") {
    location.href = "./php/nad/alta.php";
  } else if (option2 == "bajas1") {
    location.href = "./php/nad/baja.php";
  } else if (option2 == "editar1") {
    location.href = "./php/nad/editar.php";
  }
});

ent.addEventListener("change", function () {
  const option3 = ent.value;
  if (option3 == "consulta2") {
    location.href = "./php/ent/consulta.php";
  } else if (option3 == "altas2") {
    location.href = "./php/ent/alta.php";
  } else if (option3 == "bajas2") {
    location.href = "./php/ent/baja.php";
  } else if (option3 == "editar2") {
    location.href = "./php/ent/editar.php";
  }
});

pis.addEventListener("change", function () {
  const option4 = pis.value;
  if (option4 == "consulta3") {
    location.href = "./php/pis/consulta.php";
  } else if (option4 == "altas3") {
    location.href = "./php/pis/alta.php";
  } else if (option4 == "bajas3") {
    location.href = "./php/pis/baja.php";
  } else if (option4 == "editar3") {
    location.href = "./php/pis/editar.php";
  }
});
eq.addEventListener("change", function () {
  const option5 = eq.value;
  if (option5 == "consulta4") {
    location.href = "./php/eq/consulta.php";
  } else if (option5 == "altas4") {
    location.href = "./php/eq/alta.php";
  } else if (option5 == "bajas4") {
    location.href = "./php/eq/baja.php";
  } else if (option5 == "editar4") {
    location.href = "./php/eq/editar.php";
  }
});
