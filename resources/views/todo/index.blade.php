@extends('layouts.app')


@section('style')
    <style>
        #outer {
            width: auto;
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todo Application</div>

                    <div class="card-body">

                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('alert-success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                        @if (count($todo) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Completed</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todo as $todos)
                                        <tr>
                                            <td>{{ $todos->title }}</td>

                                            <td>{{ $todos->description }}</td>

                                            <td>
                                                @if ($todos->is_completed == 1)
                                                    <a class="btn btm-sm btn-success" href="">completed</a>
                                                @else
                                                    <a class="btn btm-sm btn-danger" href="">in completed</a>
                                                @endif
                                            </td>

                                            <td id="outer">
                                                <a class="inner btn btm-sm btn-success" href="{{ route('todo.show', $todos->id) }}">View</a>
                                                <a class="inner btn btm-sm btn-info" href="{{ route('todo.show', $todos->id) }}">Edit</a>

                                                <form action="" class="inner">
                                                    <input type="hidden" name="todo_id" value="{{ $todos->id }}">
                                                    <input type="submit" class="btn btm-sm btn-info">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>No todo are created</h4>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
