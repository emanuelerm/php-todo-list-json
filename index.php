<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

    <div id="app">
        <div class="container">
            <div class="row text-center justify-content-center align-items-center">
                <h1 class="text-info-emphasis">To-do Vue</h1>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card border-info mb-3">
                        <div class="card-header">Create list element</div>
                        <div class="card-body">
                            <h6 class="card-title">Add Element</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <input class="w-75" type="text" name="el" id="addElement"
                                    v-model="el" @keyup.enter="addNewEl">
                                <button type="button" name="el" class="btn btn-outline-info btn-sm ms-3 lh-1 px-2"
                                    @click="addNewEl">
                                    <i class="fa-solid fa-plus fs-6">
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card border-info mb-3">
                        <div class="card-header">Your list</div>
                        <div class="card-body">
                            <ul class="list-unstyled" v-if="list.length > 0">
                                <li class="d-flex justify-content-between" v-for="(element, index) in list">
                                    <span
                                        :class="element.done ? 'text-decoration-line-through' : ''">{{element.element}}</span>
                                    <div>
                                        <button type="button" class="btn btn-outline-success btn-sm me-3 lh-1 px-1"
                                            @click="done(index)">
                                            <i class="fa-sharp fa-solid fa-check fs-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm lh-1"
                                            @click="delete(index)">
                                            <i class="fa-sharp fa-solid fa-xmark fs-6"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                            <h4 class="text-info" v-else>Your list is empty</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>