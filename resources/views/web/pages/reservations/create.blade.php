@extends('web.layouts.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Nueva Reserva</h2>
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Departamento</label>
            <input type="text" name="department" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Extensión</label>
            <input type="text" name="extension" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Cantidad de personas</label>
            <input type="number" name="people_count" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Salón</label>
            <select name="room_id" class="form-select" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }} ({{ $room->capacity }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre del evento</label>
            <input type="text" name="event_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de público</label>
            <select name="public_type" class="form-select" required>
                <option value="interno">Interno</option>
                <option value="externo">Externo</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hora</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>
</div>
@endsection
