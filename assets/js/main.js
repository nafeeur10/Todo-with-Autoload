
const app = new Vue({
    data() {
        return {
            todo: null,
            todoList: [{ id: '', todo_title: '', todo_status: false, edit: false }],
            completed: [{ id: '', todo_title: '', todo_status: false, edit: false }],
            activeList: [{ id: '', todo_title: '', todo_status: false, edit: false }],
            lastId: null,
            todoEdit: '',
            editedTodo: null,
            idchange: null,
            checkedTodo: null,
            completedTodo: false,
            activeTodo: false,
            totalTodos: 0,
            showByIndex: null
        }
    },
    methods: {
        createTodo(e) {

            /* 
                Get the last ID of TODO. 
                New insertion will get new ID with +1
            */
            const self = this;
            var todo_name = self.todo

            this.getTodoList()

            axios.get('api/getlastid.php').then((res) => {
                self.todoList.push({ 
                    id: res.data[0].id,
                    todo_title: todo_name,
                    todo_status: false,
                    edit: false
                })
                self.lastId = res.data[0].id
            }).catch(function(res) {
                console.log(res);
            })


            // This is showing the instance pushing Todo

            


            // Form to submit Data

            let formData = new FormData();
            formData.append('todo_title', this.todo)
            formData.append('real_id', this.lastId)

            
            console.log(this.lastId);


            axios({
                method: 'POST',
                url: 'api/gettodos.php',
                data: formData
            }).then(function(res){
                console.log(res.data)
            }).catch(function(res){
                console.log(res)
            });

            this.todo = null
            e.preventDefault();
        },

        getTodoList() {
            axios.get('api/gettodos.php').then(function(res){
                app.todoList = res.data
                app.totalTodos = app.todoList.length
            }).catch(function(res){
                console.log(res);
            });
        },

        Delete(todo, todo_title, index) {
            console.log(index)
            let formData = new FormData();
            formData.append('id', todo)
            formData.append('todo_title', todo_title)

            axios({
                method: 'POST',
                url: 'api/gettodos.php',
                data: formData
            }).then(function(res){
                app.todoList.splice(index, 1);
            }).catch(function(err){
                console.log(err);
            })
        },

        Edit(id, title) {
            console.log(id);
            let name
            const self = this
            self.editedTodo = title
            self.idchange = id

            self.todoList.find(todo => {
                if(todo.id === id) {
                    todo.edit = 1
                    
                }
            });
            

            let formData = new FormData();
            formData.append('id', id)

            axios({
                method: 'POST',
                url: 'api/edit.php',
                data: formData
            }).then(function(res){
                
            }).catch(function(err) {
                console.log(err)
            })
        },

        updateTodo(e) 
        {

            console.log("Update");
            const self = this

            //console.log(id + " " + title + " " + edit)
            let formData = new FormData();
            formData.append('id', self.idchange);
            formData.append('title', self.editedTodo);
            formData.append('edit', 0);

            console.log(formData)

            axios({
                method: 'POST',
                url: 'api/update.php',
                data: formData
            }).then(function(res){
                console.log(res);
                self.todoList.find(todo => {
                    if(todo.id === self.idchange) {
                        todo.edit = 0,
                        todo.todo_title = self.editedTodo
                    }
                });
            }).catch(function(err) {
                console.log(err)
            })

            e.preventDefault();
        },
        check(e) {
            console.log(e);
        },
        complete(id, status) {
            const self = this

            self.todoList.find(todo => {
                if(todo.id === id) {
                    todo.todo_status = true
                }
            });

            let formData = new FormData()
            formData.append('id', id)
            formData.append('todo_status', true)

            axios({
                method: 'POST',
                url: 'api/active.php',
                data: formData
            }).then(function(res){
                console.log(res)
            }).catch(function(err){
                console.log(err)
            })
        },
        getCompletedTask() {
            const self = this
            axios.get('api/getcomplete.php').then(function(res){
                self.completed = res.data
            }).catch(function(res){
                console.log(res);
            });
        },
        getActiveTodo() {
            axios.get('api/getactiveTodo.php').then(function(res){
                app.activeList = res.data
            }).catch(function(res){
                console.log(res);
            });
        },
        toActiveTodo() {
            this.activeTodo = true
            this.completedTodo = false
            this.getActiveTodo()
            this.totalTodos = this.activeList.length
        },
        toCompletedTodo() {
            const self = this
            self.activeTodo = false
            self.completedTodo = true
            self.getCompletedTask()
            self.totalTodos = self.completed.length
        },
        all() {
            const self = this
            self.activeTodo = false
            self.completedTodo = false
            self.getTodoList()
            self.totalTodos = self.todoList.length
        },
        clear() {
            const self = this
            axios({
                method: 'POST',
                url: 'api/clear.php'
            }).then(function(res){
                self.completed = []
            }).catch(function(err){
                console.log(err)
            })
        },
        mouseOver() {
            this.mouseOverTik = !this.mouseOverTik
        }
    },

    mounted() {
        const self = this
        self.getTodoList();
        self.getCompletedTask();
        self.getActiveTodo();
    }
 }).$mount('#app');

