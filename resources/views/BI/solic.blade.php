@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    BUSQUEDA INDIVIDUAL
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                            <!-- New Task Form -->
                    <form action="{{ url('bi2') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                                <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">CI</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="ci" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                   Buscar    <i class="fa fa-search" aria-hidden="true"></i> 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection