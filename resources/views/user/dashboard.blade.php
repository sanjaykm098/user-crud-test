@extends('layouts.app')
@push('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div class="card-header d-flex">
                    <h3 class="card-title">
                        All Task
                    </h3>
                    <div class="ms-auto">
                        <button class="btn btn-primary" onclick="openModal('{{ route('todo.create') }}')">Add Task</button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $task->title }}
                                </td>
                                <td>
                                    {{ Str::limit($task->content, 20) }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm"
                                            onclick="openModal('{{ route('todo.show', $task->id) }}')">View</button>
                                        <button class="btn btn-warning btn-sm"
                                            onclick="openModal('{{ route('todo.edit', $task->id) }}')">Edit</button>
                                        <form action="{{ route('todo.destroy', $task->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    No Task Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    </div>
@endsection
@section('script')
    <script>
        function openModal(url) {
            $.get(url, function(data) {
                $('#modal').html(data);
                $('#modal').modal('show');
            }).fail(function() {
                Swal.fire('Error', 'Some Think Went wrong', 'error');
            })
        }
    </script>
@endsection
