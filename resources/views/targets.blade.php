{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::text('type') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
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