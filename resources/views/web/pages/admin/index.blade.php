@extends('web.layouts.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Administración</h2>
    <h3>Salones</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->is_active ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.rooms.toggle', $room) }}">
                        @csrf
                        <button class="btn btn-sm btn-secondary">Toggle</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Reservas</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Evento</th>
                <th>Salón</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->event_name }}</td>
                <td>{{ $reservation->room->name }}</td>
                <td>{{ $reservation->date->format('Y-m-d') }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->is_canceled ? 'Cancelado' : 'Activo' }}</td>
                <td>
                    @if(!$reservation->is_canceled)
                    <form method="POST" action="{{ route('admin.reservations.cancel', $reservation) }}">
                        @csrf
                        <button class="btn btn-sm btn-danger">Cancelar</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
