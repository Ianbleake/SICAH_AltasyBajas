const $inputCurp = document.querySelector("#curp");
const $inputName = document.querySelector("#name");
const $datalistCurp = document.querySelector("#curp-list");
const $datalistName = document.querySelector("#name-list");
const url = "api";

$inputCurp.addEventListener("keyup", async function() {
  let values = [];

  if ($inputCurp.value.length < 4) {
    $datalistCurp.innerHTML = "";
    values = [];
  }

  if ($inputCurp.value.length >= 4) {
    $datalistCurp.innerHTML = "";
    values = await callApi("curp", $inputCurp.value) ?? [];
    console.log(values);

    values.forEach((value) => {
      $datalistCurp.insertAdjacentHTML(
        "beforeend",
        `<option value="${value.CURP}">`
      );
    });
  }
});

$inputName.addEventListener("keyup", async function() {
  let values = [];

  if ($inputName.value.length < 4) {
    $datalistName.innerHTML = "";
    values = [];
  }

  if ($inputName.value.length >= 4) {
    $datalistName.innerHTML = "";
    values = (await callApi("nombre", $inputName.value)) ?? [];

    values.forEach((value) => {
      $datalistName.insertAdjacentHTML(
        "beforeend",
        `<option value="${value.NOMBRE}">`
      );
    });
  }
});

async function callApi(endpoint, value) {
  try {
    const response = await fetch(
      `${url}/${endpoint}.php?${endpoint}=${value}`,
      {
        method: "GET",
        mode: "no-cors"
      }
    );
    console.log(response);
    return await response.json();
  } catch (error) {
    throw new Error(error);
  }
}
