<?php
    require_once realpath("vendor/autoload.php");
?>
<?php include "src/todo/views/header.php"; ?>

<div id="app">
    <div class="container">
        <div class="row justify-content-md-center">
            <h1 class="text-center w-100 mt-5">Todos</h1>
            <hr class="mb-5 w-100">
            
            <div class="col-md-6 col-md-offset-3 px-0 mx-0 align-baseline align-bottom h-100">
                <form class="w-100 align-baseline align-bottom" @submit="createTodo">
                    <div class="form-group w-100">
                        <input type="text" class="form-control w-100 form-custom-design" placeholder="What needs to be done? " v-model="todo">
                    </div>
                </form>
            </div>

        </div>
    
        <div v-if="todoList!=null" class="row justify-content-md-center mb-5">
            <div class="col-md-6 card" style="margin-top: -15px;">
            <ul class="mt-3 pl-1">
                
                <?php include "src/todo/views/completed.php"; ?>

                <?php include "src/todo/views/activated.php"; ?>

                <?php include "src/todo/views/all.php"; ?>
                
            </ul>
            

            <hr class="w-100">
            <div class="d-flex justify-content-around w-100">
                <div>
                    <p class="mt-1">{{ totalTodos }} items left</p>
                </div>
                <div>
                    <button class="btn-sm btn btn-default d-inline-block" @click="all">All</button>
                </div>
                <div>
                    <button class="btn-sm btn btn-default d-inline-block" @click="toActiveTodo">Active</button>
                </div>
                <div>
                    <button class="btn-sm btn btn-default d-inline-block" @click="toCompletedTodo">Completed</button>
                </div>
                <div v-if="completedTodo===true">
                    <button class="btn-sm btn btn-default d-inline-block" @click="clear">Clear All</button>
                </div>
            </div>
            <hr class="w-100">
            </div>
        </div>
    </div>
</div>

<?php include "src/todo/views/footer.php"; ?>