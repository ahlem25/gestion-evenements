@can('manage events')
    {!! Form::open(['route' => ['events.destroy', $id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('events.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-eye"></i>
        </a>
        <a href="{{ route('events.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-edit"></i>
        </a>
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'

        ]) !!}
    </div>
    {!! Form::close() !!}

@endcan

@can('register events')
    <form action="{{ route('events.register', $id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary float-right">
            Register
        </button>
    </form>
@endcan
