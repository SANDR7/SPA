const showTodos = () => {
  $.getJSON("Read/read.todo.php", function (data) {
    //   var output = "<ul>";
    var Output = `<div class='row'>`;
    for (var i in data) {
      Output += `<div class='col-3 m-4 my-5 p-3 d-flex flex-column justify-content-between'>`;
      Output += `<b>${data[i].title}</b>`;

      Output += `<div>`;
      if (data[i].complete == 1) {
        Output += `<div class='my-2'>gesloten</div>`;
      } else {
        Output += `<div class='my-2'>Open</div>`;
      }
      Output += `<div>`;
      Output += `<button type="button"
            class="btn btn-info"
            data-toggle="modal"
            data-target="#modal${data[i].id}">
               Bewerken
            </button>`;
      Output += `</div>`;
      Output += `</div>`;
      Output += `</div>`;
      Output += `<div>`;

      Output += `
             <div class="modal fade"
      id="modal${data[i].id}"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal1-label"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal1-label">Mijn titel</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal1"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class='w-100 m-auto p-4 d-flex flex-column'>
          <input type="text" value="${data[i].title}" />
          <button id="addButton">Todo Bewerk</button><br />
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Sluiten
            </button>
            <button type="button" class="btn btn-primary">Opslaan</button>
          </div>
        </div>
      </div>
    </div>
            `;
      Output += `</div>`;
    }
    Output += "</div>";
    $("#Dist").html(Output);
  });
};

const addTodo = () => {
  var invoer = $(`#invoer`).val();
  if (invoer === "") {
    $(`#isFinished`).html(`<div class='alert alert-danger my-4'>Het veld is leeg</div>`);
    return false;
  }
  $.ajax({
    url: `Create/create.todo.php`,
    method: `POST`,
    data: { invoer: invoer },
  }).done(function (data) {
    if (data == "OK") {
      $(`#isFinished`).html(`<div class='alert alert-success my-4'>Gelukt!</div>`);
      showTodos();
      $("#invoer").val('');
    }
    else {
      $(`#isFinished`).html(`<div class='alert alert-danger my-4'>Er ging iets fout!</div>`);
    }
  });
}
const openEditModel = () => {
  $('.model').show();
}

// const deleteTodo = () => {
// }