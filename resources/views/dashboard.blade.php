
@extends('layouts.app')
@section('title')
    Dasbor
@endsection
@section('content')
    <div class="container">
        <h2>Selamat datang di Dasbor Anda</h2>
        <p>Ini adalah dasbor Anda untuk mengelola tugas, rutinitas, catatan, dan file.</p>
        
        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Tugas</h5>
                        <p class="card-text flex-grow-1">Anda memiliki <strong>{{ $tasksCount }}</strong> tugas yang belum selesai.</p>
                        <a href="{{ route('projects.index') }}" class="btn btn-primary mt-auto">Lihat Tugas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Rutinitas</h5>
                        <p class="card-text flex-grow-1">Anda memiliki <strong>{{ $routinesCount }}</strong> rutinitas terjadwal hari ini.</p>
                        <a href="{{ route('routines.index') }}" class="btn btn-primary mt-auto">Lihat Rutinitas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Catatan</h5>
                        <p class="card-text flex-grow-1">Anda memiliki <strong>{{ $notesCount }}</strong> catatan tersimpan.</p>
                        <a href="{{ route('notes.index') }}" class="btn btn-primary mt-auto">Lihat Catatan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">File</h5>
                        <p class="card-text flex-grow-1">Anda memiliki <strong>{{ $filesCount }}</strong> file.</p>
                        <a href="{{ route('files.index') }}" class="btn btn-primary mt-auto">Lihat File</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Tugas Terbaru</h5>
                        <ul class="list-group flex-grow-1">
                            @foreach($recentTasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $task->title }}
                                    <span class="badge bg-primary rounded-pill">{{ $task->status == 'to_do' ? 'Belum Dikerjakan' : 'Sedang Berjalan' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Rutinitas Hari Ini</h5>
                        <ul class="list-group flex-grow-1">
                            @foreach($todayRoutines as $routine)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $routine->title }}
                                    <span class="badge bg-primary rounded-pill">{{ $routine->frequency }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Catatan Terbaru</h5>
                        <ul class="list-group flex-grow-1">
                            @foreach($recentNotes as $note)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $note->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Pengingat Mendatang</h5>
                        <ul class="list-group flex-grow-1">
                            @foreach($upcomingReminders as $reminder)
                                <li class="list-group-item d-flex justify-content-between align-items-center {{ $reminder->date->isToday() ? 'bg-warning' : ($reminder->date->isPast() ? 'bg-danger' : 'bg-success') }}">
                                    {{ $reminder->title }}
                                    <span class="badge bg-primary rounded-pill">{{ $reminder->date->format('d M') }} {{ $reminder->time ? $reminder->time->format('H:i') : '' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
