{!! Form::open(array('route' => 'missions.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}

@extends('index')

@section('tittle', 'Missions')

@section('content')

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Targets</th>
            <th>Employees</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($missions as $mission)
            <tr>
                <td>{{ $mission->id }}</td>
                <td>{{ $mission->title }}</td>
                <td>{{ $mission->status }}</td>
                <td>
                    <a href="{{ URL::to('targets/') }}" class="btn btn-success btn-sm">Show</a>
                    <a href="{{ URL::to('targets/edit') }}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                    <a href="{{ URL::to('employees/') }}" class="btn btn-success btn-sm">Show</a>
                    <a href="{{ URL::to('employees/edit') }}" class="btn btn-info btn-sm">Edit</a>
                </td>

                <td>
                    {!! Form::open( ['url' => 'missions/'. $mission->id, 'class' => 'pull-right'] ) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete mission', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--{!! $missions->render() !!}--}}

@stop