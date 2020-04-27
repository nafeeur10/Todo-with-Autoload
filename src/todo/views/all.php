<li v-for="(todo,index) in todoList" :key="todo.index" v-if="activeTodo===false && completedTodo===false" class="pt-3 pb-3 border-li" @mouseover="showByIndex = index" @mouseout="showByIndex = null">
                    
    <div class="row" v-if="todo.edit==0">
        <div class="col-md-1">
            <button class="btn-style btn-style-status-complete" v-if="todo.todo_status==1"><i class="fas fa-check"></i></button>
            <button class="btn-style" v-if="todo.todo_status==0" @click="complete(todo.id, todo.todo_status)"></button>
        </div>
        <div class="col-md-10">
            <span @click="Edit(todo.id, todo.todo_title)" v-if="todo.edit==0" :class="{ 'activetodo' : todo.todo_status == 1 }">
                {{ todo.todo_title }}
            </span> 
        </div>

        <div class="col-md-1">
            <span @click="Delete(todo.id, todo.todo_title, index)" style="font-size: 15px!important; color: red;" v-show="showByIndex === index">x</span>
        </div>
    </div>    
    
    <form class="w-100" v-if="todo.edit==1" @submit="updateTodo">
        <input type="text" class="form-control w-100" v-model="editedTodo">
    </form>
           
</li>