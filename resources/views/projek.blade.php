<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home </title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="p-5">
        <h2 class="text-xl text-center">Project Management App</h2>
        <h3 class="text-lg text-center">Dwi Nabela</h3>
    </div>

    {{-- @dd($data) --}}
    <div class="overflow-x-auto">
        <div class="btn p-5 m-3">
            <a href="/projects/create">
                tambah data
            </a>
        </div>
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr class="capitalize">
                    <th></th>
                    <th>Project Name</th>
                    <th>Client</th>
                    <th>project leader</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>progress</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr class="hover:active">
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->client }}</td>
                        <td>
                            <div class="flex">
                                <div class="p-2">
                                    <img class="rounded-full w-10 h-10"
                                        src="{{ asset('images/' . $item->leader_image) }}"
                                        alt="{{ $item->leader_name }}">
                                </div>
                                <div class="p-2">
                                    <h3 class="font-bold">{{ $item->leader_name }}</h3>
                                    <h4>{{ $item->leader_email }}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->start_date)->format('d M Y') }}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->start_date)->format('d M Y') }}
                        </td>
                        <td>
                            <progress class="progress w-40 @if ($item->progress == 100) progress-success @endif"
                                value="{{ $item->progress }}" max="100"></progress>
                            {{ $item->progress }}%
                        </td>
                        <td>
                            <div class="flex">
                                <form action="/projects/{{ $item->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 fill-red-400 p-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                                <a href="projects/{{ $item->id }}/edit">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 fill-green-400 p-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>


                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</body>
<script>
    // menambahkan konifrimasi ketika tombol dengan tipe submit ditekan
    document.querySelectorAll('button[type="submit"]').forEach((item) => {
        item.addEventListener('click', (e) => {
            if (!confirm('yakin mau di hapus?')) {
                e.preventDefault();
            }
        })
    })
</script>

</html>
