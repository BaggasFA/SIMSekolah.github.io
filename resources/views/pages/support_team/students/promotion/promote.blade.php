<form method="post" action="{{ route('students.promote', [$fc, $fs, $tc, $ts]) }}">
    @csrf
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Current Session</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students->sortBy('user.name') as $sr)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img class="rounded-circle" style="height: 30px; width: 30px;" src="{{ $sr->user->photo }}" alt="img"></td>
                <td>{{ $sr->user->name }}</td>
                <td>{{ $sr->session }}</td>
                <td>
                    <select class="form-control select" name="p-{{$sr->id}}" id="p-{{$sr->id}}">
                        <option value="P">Promosi</option>
                        <option value="D">Tidak</option>
                        <option value="G">Sudah Lulus</option>
                    </select>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center mt-3">
        <button class="btn btn-success"><i class="icon-stairs-up mr-2"></i> Promosi Siswa</button>
    </div>
</form>
