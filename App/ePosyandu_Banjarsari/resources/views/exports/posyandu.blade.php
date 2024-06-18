<table>
    <thead>
    <tr>
        <th>NIK</th>
        <th>NKK</th>
        <th>Nama Lengkap</th>
        <th>Posyandu</th>
        <th>Tempat Lahir</th>
        <th>Tgl Lahir</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>RT/RW</th>
        <th>Kategori</th>
        <th>Tgl Daftar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td width="auto">{{ $user->nik }}</td>
            <td width="auto">{{ $user->nkk }}</td>
            <td width="auto">{{ $user->nama }}</td>
            <td width="auto">{{ $user->posyandu[0]->nama }}</td>
            <td width="auto">{{ $user->tempat_lahir }}</td>
            <td width="auto">{{ $user->tgl_lahir }}</td>
            <td width="auto">{{ $user->umur }}</td>
            <td width="auto">{{ $user->alamat }}</td>
            <td width="auto">{{ $user->rt_rw }}</td>
            <td width="auto">{{ $user->kategori[0]->nama }}</td>
            <td width="auto">{{ date('d/M/Y', strtotime($user->created_at)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>