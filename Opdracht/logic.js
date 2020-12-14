const showTodos = () => {
    $.getJSON("Read/read.todo.php", function (data) {
        //   var output = "<ul>";
        var Output = `<ul>`;
        for (var i in data) {
            Output += `<li>`;
            Output += `<b>${data[i].title}</b>`;
            if (data[i].complete == 1) {
                Output += `<div>gesloten</div>`;
            } else {
                Output += `<div>Open</div>`;
            }
            Output += `</li>`;
        }
        Output += "</ul>";
        $("#Dist").html(Output);
    });
};

const addTodo = () => {
    var invoer = $(`#invoer`).val();
    $.ajax({
        url: `Create/create.todo.php`,
        method: `POST`,
        data: { invoer: invoer },
    }).done(function (data) {
        if (data == "OK") {
            $(`#isFinished`).text(`Gelukt!`);
            showTodos();
            $("#invoer").val('');
        } else {
            $(`#isFinished`).text(`Er ging iets fout!`);
        }
    });
}

// const deleteTodo = () => {
// }