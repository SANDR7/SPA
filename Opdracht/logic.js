const showTodos = () => {
    $.getJSON("Read/read.todo.php", function (data) {
        //   var output = "<ul>";
        var Output = `<div class='row'>`;
        for (var i in data) {
            Output += `<div class='col-2 m-2 p-2 d-flex flex-column justify-content-between'>`;
            Output += `<b>${data[i].title}</b>`;
            if (data[i].complete == 1) {
                Output += `<div>gesloten</div>`;
            } else {
                Output += `<div>Open</div>`;
            }
            Output += `<div>`;
            Output += `<button onclick="openEditModel()" type="button"
      class="btn btn-info"
      data-toggle="modal"
      data-target="#modal1">Bewerken</button>`;
            Output += `</div>`;
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
    $('#temp').show();
}

// const deleteTodo = () => {
// }