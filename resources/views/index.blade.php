<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>
    <link rel="stylesheet" href="/css/app.css">

</head>
<body>
    <div id="app" class="container">

        <div class="row mt-5">
            <div class="col-5">
                <form method="POST" action="/project-store" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

                    <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" id="name" v-model="form.name" name="name" class="form-control">
                        <span class="text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                    </div>

                    <div class="form-group">
                        <label>Project Description</label>
                        <input type="text" id="description" v-model="form.description" name="description" class="form-control">
                        <span class="text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                    </div>

                    <button :disabled="form.errors.any()">Submit</button>
                </form>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-5">
                <h2>Project list:</h2>
                <ul class="list-group sample-list">
                    @foreach($projects as $project)
                        <li class="list-group-item">{{ $project->name }}: {{ $project->description }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <script src="/js/app.js"></script>
</body>
</html>
