const loby = document.getElementById("loby");
const cerrar = document.getElementById("cerrar");
const nad = document.getElementById("nad");
const ent = document.getElementById("ent");
const pis = document.getElementById("pis");
const eq = document.getElementById("eq");
const conf = document.getElementById("imgC");

let exit = false;

function confirmarEliminacion(event) {
  var id = document.getElementById("eliminar").value;
  var confirmar = confirm(
    "¿Estás seguro de que deseas eliminar el registro con ID: " + id + "?"
  );
  if (!confirmar) {
    event.preventDefault(); // Evita el envío del formulario
  }
}

function confirmarSubida(event) {
  var id = document.getElementById("subir").value;
  var confirmar = confirm("¿Estás seguro de que deseas subir el registro ?");
  if (!confirmar) {
    event.preventDefault(); // Evita el envío del formulario
  }
}

loby.addEventListener("change", function () {
  const option1 = loby.value;
  if (option1 == "principal") {
    location.href = "../../index.html";
  } else if (option1 == "galeria") {
    location.href = "../../index.html";
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
    location.href = "../nad/consulta.php";
  } else if (option2 == "altas1") {
    location.href = "../nad/alta.php";
  } else if (option2 == "bajas1") {
    location.href = "../nad/baja.php";
  } else if (option2 == "editar1") {
    location.href = "../nad/editar.php";
  }
});
ent.addEventListener("change", function () {
  const option3 = ent.value;
  if (option3 == "consulta2") {
    location.href = "../ent/consulta.php";
  } else if (option3 == "altas2") {
    location.href = "../ent/alta.php";
  } else if (option3 == "bajas2") {
    location.href = "../ent/baja.php";
  } else if (option3 == "editar2") {
    location.href = "../ent/editar.php";
  }
});
pis.addEventListener("change", function () {
  const option4 = pis.value;
  if (option4 == "consulta3") {
    location.href = "../pis/consulta.php";
  } else if (option4 == "altas3") {
    location.href = "../pis/alta.php";
  } else if (option4 == "bajas3") {
    location.href = "../pis/baja.php";
  } else if (option4 == "editar3") {
    location.href = "../pis/editar.php";
  }
});
eq.addEventListener("change", function () {
  const option5 = eq.value;
  if (option5 == "consulta4") {
    location.href = "../eq/consulta.php";
  } else if (option5 == "altas4") {
    location.href = "../eq/alta.php";
  } else if (option5 == "bajas4") {
    location.href = "../eq/baja.php";
  } else if (option5 == "editar4") {
    location.href = "../eq/editar.php";
  }
});

conf.addEventListener("change", function () {
  if (this.checked) {
    document.getElementById("imagen").disabled = false;
  } else {
    document.getElementById("imagen").disabled = true;
  }
});
