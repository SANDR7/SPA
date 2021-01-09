// const JSONSource = "http://localhost/SPA/Vue-Todo/process.todo.php";
// const JSONSource =
//   "http://localhost/School/Front/Spa//Vue-Todo/process.todo.php";
const JSONSource = "https://84231.ict-lab.nl/SPA/Vue/process.todo.php";

var app = new Vue({
  el: "#app",
  data: {
    errorMsg: "",
    successMsg: "",
    showAddModal: false,
    showEditModal: false,
    showDeleteModal: false,
    todos: [],
    newTodo: {
      name: "",
      finished: "",
    },
    currentTodo: {},
  },
  mounted: function () {
    this.getAllTodos();
  },
  methods: {
    _onInputExtendedCost: function ($event) {
      this.extendedCost = parseInt($event.target.value);
      // Go update other inputs here
    },
    getAllTodos() {
      axios.get(`${JSONSource}?action=read`).then(function (response) {
        if (response.data.error) {
          app.errorMsg = response.data.message;
        } else {
          app.todos = response.data.todos;
        }
      });
    },
    addTodo() {
      const formData = app.toFormData(app.newTodo);
      axios
      .post(`${JSONSource}?action=create`, formData)
      .then(function (response) {
        app.newTodo = { title: "", complete: "" };
          if (response.data.error) {
            app.errorMsg = response.data.message;
          } else {
            app.successMsg = response.data.message;
            app.getAllTodos();
          }
        });
    },
    updateTodo() {
      var formData = app.toFormData(app.currentTodo);
      axios
        .post(`${JSONSource}?action=update`, formData)
        .then(function (response) {
          if (app.currentTodo.title === "") {
            return app.deleteTodo();
          }
          app.currentTodo = {};
          if (response.data.error) {
            app.errorMsg = response.data.message;
          } else {
            app.successMsg = response.data.message;
            app.getAllTodos();
          }
        });
    },
    deleteTodo() {
      var formData = app.toFormData(app.currentTodo);
      axios
        .post(`${JSONSource}?action=delete`, formData)
        .then(function (response) {
          app.currentTodo = {};
          if (response.data.error) {
            app.errorMsg = response.data.message;
          } else {
            app.successMsg = response.data.message;
            app.getAllTodos();
          }
        });
    },
    toFormData(obj) {
      var fd = new FormData();
      for (var i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    },
    selectTodo(todo) {
      app.currentTodo = todo;
    },
    clearMsg() {
      app.errorMsg = "";
      app.successMsg = "";
    },
  },
});
