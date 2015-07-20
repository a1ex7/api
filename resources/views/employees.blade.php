{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('position', 'Position:') !!}
			{!! Form::text('position') !!}
		</li>
		<li>
			{!! Form::label('mission_id', 'Mission_id:') !!}
			{!! Form::text('mission_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}