@extends('layouts.master')
@section('page_title', 'My Children')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Anak-anakku</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>No_Administrasi</th>
                    <th>Kelas</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="photo"></td>
                        <td>{{ $s->user->name }}</td>
                        <td>{{ $s->adm_no }}</td>
                        <td>{{ $s->my_class->name.' '.$s->section->name }}</td>
                        <td>{{ $s->user->email }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="{{ route('students.show', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-eye"></i> Lihat Profil </a>
                                        <a target="_blank" href="{{ route('marks.year_selector', $s->user->id) }}" class="dropdown-item"><i class="icon-check"></i> Hasil Ujian </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{--Student List Ends--}}

@endsection
